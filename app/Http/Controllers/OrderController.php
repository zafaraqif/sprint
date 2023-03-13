<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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
            ])
        ]);
        $user = Auth::user();
        $order = $user->order->last();
        $id = $order->order_id;
        return redirect('/order/' . $id . '/file/create');
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
