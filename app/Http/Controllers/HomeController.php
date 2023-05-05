<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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
            $serviceId = Arr::pluck(Order::where($user_service_id, '=', $id)->get(), 'service_id');
            $services = Service::findMany($serviceId);
            $payments = null;
        } elseif (Auth::user()->user_type == 2) {
            Auth::user()->service == null ?  $id = null : $id = Auth::user()->service->service_id;
            $user_service_id = 'service_id';
            $relationship = '=';
            $total = number_format((float)Order::where($user_service_id, '=', $id)->where('order_status', '>=', '5')->get()->sum('total_price'), 2, '.', '');
            $orderId = Arr::pluck(Order::where($user_service_id, '=', $id)->get(), 'order_id');
            $payments = Payment::whereIn('order_id', $orderId)->get();
            $services = null;
        }

        $pending = Order::where($user_service_id, '=', $id)->where('order_status', '=', 2)->get()->count();
        $approved = Order::where($user_service_id, '=', $id)->where('order_status', '=', 3)->get()->count();
        $completed = Order::where($user_service_id, '=', $id)->where('order_status', '=', 5)->get()->count();

        $orders = Order::where($user_service_id, '=', $id)->where('order_status', $relationship, 2)->where('order_status', '<=', 4)->orderBy('order_pickup_date')->orderBy('order_pickup_time')->get();
        $pickups = Order::where($user_service_id, '=', $id)->where('order_status', '=', 5)->orderBy('order_pickup_date')->orderBy('order_pickup_time')->get();

        $ordersPickupTime = Arr::pluck($orders, 'order_pickup_time');
        $pickupsPickupTime = Arr::pluck($pickups, 'order_pickup_time');
        $timezone = 'Asia/Kuala_Lumpur';

        foreach ($ordersPickupTime as $ot)
            $ordersTime[] = Carbon::createFromTimeString($ot, $timezone);

        foreach ($pickupsPickupTime as $pt)
            $pickupsTime[] = Carbon::createFromTimeString($pt, $timezone);

        isset($ordersTime) ?:  $ordersTime = null;
        isset($pickupsTime) ?:  $pickupsTime = null;

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
                'payments' => $payments,
                'ordersTime' => $ordersTime,
                'pickupsTime' => $pickupsTime,
            ]
        );
    }
}
