<?php

namespace App\Http\Controllers\Checkout;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Services\Checkout\CheckoutService as Service;

class CheckoutController extends BaseController {

    // public function index() {
    //     return view("v1/checkout/checkout");
    // }

    public function index() {
        return view("order-kamu");
    }

    public function cekout() {
        return view("pages.User.order-kamu");
    }


    // public function onSubmit() {
    //     return view("v1/checkout/try-checkout");
    // }

    public function checkoutuser(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'phone_number'  => 'required|string|min:10|max:14',
            'no_meja'       => 'required|string',
        ]);

        if (!Session::has('cart')) {
            return view('order-kamu');
        }
        
        $oldCart        = Session::get('cart');

        $cart           = new Cart($oldCart);
        $qty            = $cart->totalQty;
        $totalPrice     = $cart->totalPrice;

        $pajakppn       = $totalPrice * 10 / 100;
        $totaljumlah    = $totalPrice + $pajakppn;

        $gettahun       = date('Y');
        $subgettahun    = substr($gettahun,2);
        $getbulan       = date('m');
        
        if($getbulan[1] < 10){
			$bln_tgl    = str_replace('0','',$getbulan[1]);
		}else{
            $bln_tgl    = $getbulan[1];
        }
        
        $array_bln      = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
		$bln            = $array_bln[date($bln_tgl)];

        $cektabel       = Order::whereYear('created_at', date('Y'))
                                    ->whereMonth('created_at', date('m'))->max('kode') ?? 1;
                                    
        $kodeUrut       = $cektabel;
		$noUrut         = (int) substr($kodeUrut, 0, 1);
        $noUrut++;
		$kodeUruttt     = sprintf($noUrut."/RF/".$bln.'/'.$gettahun);

        if (Auth::check()) {
            $order = Order::create([
                'user_id'       => Auth::user()->id,
                'name'          => $request->input('name'),
                'phone_number'  => $request->input('phone_number'),
                'qty'           => $qty,
                'total_price'   => $totalPrice,
                'kode'          => $kodeUruttt,
                'no_meja'       => $request->input('no_meja'),
                'pajak_ppn'     => $pajakppn,
                'total'         => $totaljumlah,
            ]);

            foreach ($cart as $item) {
                if (is_array($item) || is_object($item)) {
                    foreach ($item as $product) {
                        $orderDetail = OrderDetail::create([
                            'order_id'      => $order->id,
                            'menu_id'       => $product['item']['id'],
                            'level'         => $product['customer_request']['level'],
                            'request'       => $product['customer_request']['request'],
                        ]);
                    }
                }
            }
        } else {
            // Store to table order
            $order = Order::create([
                'user_id'       => '0',
                'name'          => $request->input('name'),
                'phone_number'  => $request->input('phone_number'),
                'qty'           => $qty,
                'total_price'   => $totalPrice,
                'kode'          => $kodeUruttt,
                'no_meja'       => $request->input('no_meja'),
                'pajak_ppn'     => $pajakppn,
                'total'         => $totaljumlah,
            ]);

            foreach ($cart as $item) {
                if (is_array($item) || is_object($item)) {
                    foreach ($item as $product) {
                        $orderDetail = OrderDetail::create([
                            'order_id'      => $order->id,
                            'menu_id'       => $product['item']['id'],
                            'level'         => $product['customer_request']['level'],
                            'request'       => $product['customer_request']['request'],
                        ]);
                    }
                }
            }
        }
        
        Session::forget('cart');
        
        return redirect()->route('user.checkout.success', ['id' => $order->id])->with('key', 'checkout.success');
    }


    public function create(Request $req) {
        $service = new Service();

        $result = tap($service->createInvoice($req->all()))->save();
        return $result ($req->all());

    }
}