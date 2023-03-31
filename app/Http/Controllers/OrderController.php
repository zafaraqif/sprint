<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Order::class, 'order');
    }

    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->user_type == 1) {
            $order = Order::where('user_id', '=', $user->user_id)->orderBy('order_pickup_date', 'desc')->orderBy('order_pickup_time', 'desc')->get();
        } elseif (Auth::user()->user_type == 2) {
            Auth::user()->service == null ? $order = null : $order = Order::where('service_id', '=', $user->service->service_id)->orderBy('order_pickup_date', 'desc')->orderBy('order_pickup_time', 'desc')->get();
        }

        return inertia(
            'Order/Index',
            [
                'orders' => $order
            ]
        );
    }

    public function create(Service $service)
    {
        return inertia(
            'Order/Create',
            [
                'service' => $service,
            ]
        );
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

    public function show(Order $order)
    {
        if ($order->total_price == null) {
            $price = 0;
            $total = 0;
            foreach ($order->file as $file) {
                switch ($file->print_color) {
                    case 1:
                        $price = $file->pages_to_print * $order->service->price_bnw;
                        break;
                    case 2:
                        $price = $file->pages_to_print * $order->service->price_color;
                        break;
                };
                switch ($file->paper_weight) {
                    case 0:
                        break;
                    case 1:
                        $price = $price + ($file->sheets_to_print * $order->service->charge_80gsm);
                        break;
                };
                $total = $total + $price;
            }
            $order->total_price = $total;
            $order->save();
        }

        if ($order->order_status === null) {
            return inertia(
                'Order/Show',
                [
                    'order' => $order,
                    'files' => $order->file,
                    'service' => $order->service,
                    'page' => 'order',
                ]
            );
        } else {
            return inertia(
                'Order/Show',
                [
                    'order' => $order,
                    'files' => $order->file,
                    'service' => $order->service,
                    'page' => 'summary',
                ]
            );
        }
    }

    public function update(Order $order)
    {
        $order->order_status = 6;
        $order->save();
        return redirect()->back()->with('success', 'Order was collected!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Order was deleted!');
    }
}
