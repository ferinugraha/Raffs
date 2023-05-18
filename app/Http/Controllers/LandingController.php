<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Checkout\CheckoutService as Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getDetailProduct($id)
    {
        $product    = Menu::findOrFail($id);
        return view('detail-product', compact('product'));
    }

    public function usergetDetailProduct($id)
    {
        $product    = Menu::findOrFail($id);
        return view('pages.User.detail-product', compact('product'));
    }

    public function addToCart(Request $request, $id)
    {
        $menu               = Menu::findOrFail($id);
        $customerRequest    = ['level' => $request->input('level'), 'request' => $request->input('request')];
        $oldCart            = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart               = new Cart($oldCart);
        $cart->add($menu, $customerRequest);
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Berhasil menambah menu ke order!');
    }

    public function getRemoveItem($id)
    {
        $oldCart        = Session::has('cart') ? Session::get('cart') : null;
        $cart           = new Cart($oldCart);
        $cart->remoteItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function payment(Request $req) {
        $service        = new Service();

        return $service->createInvoice($req->all());
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('order-kamu');
        }
        $oldCart        = Session::get('cart');
        $cart           = new Cart($oldCart);
        $cartmenu = $cart->totalPrice;
        $hasilppn = $cartmenu * 10 / 100;
        $jumlahppn= $cartmenu + $hasilppn;
        return view('order-kamu', ['menus' => $cart->items, 'cart' => $cart, 'jumlahppn' => $jumlahppn ]);
    }

    public function usergetCart()
    {
        if (!Session::has('cart')) {
            return view('pages.User.order-kamu');
        }
        $oldCart        = Session::get('cart');
        $cart           = new Cart($oldCart);
        return view('pages.User.order-kamu', ['menus' => $cart->items, 'cart' => $cart]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string|min:10|max:14',
        ]);

        if (!Session::has('cart')) {
            return view('pages.user.order-kamu');
        }
        
        $oldCart        = Session::get('cart');

        $cart           = new Cart($oldCart);
        $qty            = $cart->totalQty;
        $totalPrice     = $cart->totalPrice;

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
                'kode'          => $kodeUruttt
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
            $order = Order::create([
                'name'          => $request->input('name'),
                'phone_number'  => $request->input('phone_number'),
                'qty'           => $qty,
                'total_price'   => $totalPrice,
                'kode'          => $kodeUruttt
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
        
        return redirect()->route('checkout.success', ['id' => $order->id])->with('key', 'checkout.success');
    }

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

    public function checkoutSuccess($id)
    {
        $order          = Order::findOrFail($id);
        $orderDetails   = $order->details;
        
        $menus = [];
        foreach ($orderDetails as $orderDetail) {
            $menu           = OrderDetail::findOrFail($orderDetail['id']);
            if ($menu) {
                $menus[]    = $menu->menu->toArray();
            }
        }

        return view('checkout-success', ['order' => $order, 'menus' => $menus]);
    }

    public function exportPDF()
    {
        $customer       = Session::get('customer');
        $order          = Order::where('name', $customer['name'])->latest()->first();
        $cart           = unserialize($order->cart);
        $date           = $order->created_at->timezone('Asia/Jakarta');

        $data = [
            'title'     => 'Struk Pembayaran',
            'order'     => $order,
            'cart'      => $cart,
            'date'      => $date
        ];
    }
}
