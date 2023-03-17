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
        if (Auth::user()->user_type == 1) {
            $id = Auth::user()->user_id;
            $user_service_id = 'user_id';
            $relationship = '>=';
            $total = Order::where($user_service_id, '=', $id)->get()->count();

            $getService = array();
            foreach (Order::where($user_service_id, '=', $id)->get() as $order)
                array_push($getService, $order->service_id);
            $services = Service::findMany(array_unique($getService));
        } elseif (Auth::user()->user_type == 2) {
            if (Auth::user()->service == null) {
                $id = null;
            } else {
                $id = Auth::user()->service->service_id;
            }
            $user_service_id = 'service_id';
            $relationship = '=';
            $total = Order::where($user_service_id, '=', $id)->get()->sum('total_price');
            $services = null;
        }

        $pending = Order::where($user_service_id, '=', $id)->where('order_status', '=', 2)->get()->count();
        $approved = Order::where($user_service_id, '=', $id)->where('order_status', '=', 3)->get()->count();
        $completed = Order::where($user_service_id, '=', $id)->where('order_status', '=', 5)->get()->count();

        $orders = Order::where($user_service_id, '=', $id)->where('order_status', $relationship, 2)->where('order_status', '<=', 4)->orderBy('order_pickup_date')->orderBy('order_pickup_time')->get();
        $pickups = Order::where($user_service_id, '=', $id)->where('order_status', '=', 5)->orderBy('order_pickup_date')->orderBy('order_pickup_time')->get();

        return inertia(
            'Home/Index',
            [
                'pending' => $pending,
                'approved' => $approved,
                'completed' => $completed,
                'total' => $total,
                'orders' => $orders,
                'pickups' => $pickups,
                'services' => $services,
            ]
        );
    }
}
