<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->user_id;

        $pending = Order::where('user_id', '=', $id)->where('order_status', '=', 1)->get()->count();
        $completed = Order::where('user_id', '=', $id)->where('order_status', '=', 5)->get()->count();
        $total = Order::where('user_id', '=', $id)->get()->count();

        $status = Order::where('user_id', '=', $id)->where('order_status', '>=', 1)->where('order_status', '<=', 3)->orderBy('order_pickup_date')->orderBy('order_pickup_time')->get();
        $pickup = Order::where('user_id', '=', $id)->where('order_status', '=', 4)->orderBy('order_pickup_date')->orderBy('order_pickup_time')->get();

        $getService = array();

        foreach (Order::where('user_id', '=', $id)->get() as $order) {
            array_push($getService, $order->service_id);
        }
        $service = Service::findMany(array_unique($getService));

        return inertia(
            'Home/Index',
            [
                'pending' => $pending,
                'completed' => $completed,
                'total' => $total,
                'orders' => $status,
                'pickups' => $pickup,
                'services' => $service,
            ]
        );
    }
}
