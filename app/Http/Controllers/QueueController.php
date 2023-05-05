<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class QueueController extends Controller
{
    public function index()
    {
        if (Auth::user()->service == null) {
            $service_id = null;
        } else {
            $service_id = Auth::user()->service->service_id;
        }
        $orders = Order::where('service_id', '=', $service_id)->where('order_status', '>=', 3)->where('order_status', '<=', 4)->orderBy('order_pickup_date')->orderBy('order_pickup_time')->get();

        $getOrderId = array();
        $fileCount = array();
        foreach ($orders as $order)
            array_push($getOrderId, $order->order_id);
        foreach ($getOrderId as $g)
            $fileCount[] = File::where('order_id', '=', $g)->get()->count();

        $pickupTime = Arr::pluck($orders, 'order_pickup_time');
        $timezone = 'Asia/Kuala_Lumpur';

        foreach ($pickupTime as $t)
            $time[] = Carbon::createFromTimeString($t, $timezone);

        isset($time) ?:  $time = null;

        return inertia(
            'Queue/Index',
            [
                'orders' => $orders,
                'files' => $fileCount,
                'times' => $time,
            ]
        );
    }
}
