<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders()
    {
        $orders         = Order::where('status', 'Active')->latest()->get();
        return view('pages.kasir.orders.index', ['orders' => $orders]);
    }

    public function getOrderDetail($id)
    {
        $order          = Order::findOrFail($id);
        $orderDetails   = $order->details;

        $details = [];
        foreach ($orderDetails as $orderDetail) {
            $detail = OrderDetail::findOrFail($orderDetail['id']);

            $detailMenu = $detail->menu->toArray();
            $detailMenu['level'] = $orderDetail['level'];
            $detailMenu['request'] = $orderDetail['request'];
            
            if ($detailMenu) {
                $details[] = $detailMenu;
            }
        }

        return view('pages.kasir.orders.detail-order', ['details' => $details]);
    }

    public function statusUpdate($id)
    {
        Order::where('id', $id)->update(['status' => 'Inactive']);
        return back()->with('success', 'Berhasil mengubah status active ke inactive');
    }
}
