<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return inertia(
            'Order/Index',
            [
                'orders' => Order::all()
            ]
        );
    }

    public function create()
    {
        return inertia('Order/Create');
    }

    public function store(Request $request)
    {
        Order::create([
            ...$request->all(),
            ...$request->validate([
                'user_id' => 'required',
                'service_id' => 'required',
                'order_pickup_date' => 'required',
                'order_pickup_time' => 'required',
                'total_price' => 'required',
                'order_status' => 'required',
            ])
        ]);
        return redirect()->route('order.index')->with('success', 'Order was created!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Order $service)
    {
        //
    }

    public function update(Request $request, Order $service)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
