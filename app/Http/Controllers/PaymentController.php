<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function create(Order $order)
    {
        $order->order_status = 2;
        $order->save();
        return redirect()->route('home.index')->with('success', 'Order pending!');
    }
}
