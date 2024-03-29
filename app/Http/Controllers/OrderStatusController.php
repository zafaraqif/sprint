<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderStatusController extends Controller
{
    public function reject(Order $order)
    {
        $order->order_status = 0;
        $order->save();
        return redirect()->back()->with('success', 'Order #' . $order->order_id . ' was rejected!');
    }

    public function cancel(Order $order)
    {
        $order->order_status = 1;
        $order->save();
        return redirect()->back()->with('success', 'Order #' . $order->order_id . ' was cancelled! Refund is being processed.');
    }

    public function approve(Order $order)
    {
        $order->order_status = 3;
        $order->save();
        return redirect()->back()->with('success', 'Order #' . $order->order_id . ' was approved!');
    }

    public function printing(Order $order)
    {
        $order->order_status = 4;
        $order->save();
        return redirect()->back()->with('success', 'Printing Order #' . $order->order_id . '!');
    }

    public function completed(Order $order)
    {
        $order->order_status = 5;
        $order->save();
        return redirect()->route('queue.index')->with('success', 'Order #' . $order->order_id . ' was completed!');
    }

    public function pickup(Order $order)
    {
        $order->order_status = 6;
        $order->save();
        return redirect()->back()->with('success', 'Order #' . $order->order_id . ' was collected!');
    }
}
