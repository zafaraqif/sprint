<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Facades\Label84\HoursHelper\HoursHelper;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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
        if ($user->user_type == 1) {
            $orders = Order::where('user_id', '=', $user->user_id)->get();

            if (count($orders) !== 0) {
                $order = Order::where('user_id', '=', $user->user_id)->where('order_status', '!=', null)->orderBy('order_pickup_date', 'desc')->orderBy('order_pickup_time', 'desc')->get();
                $serviceId = Arr::pluck($order, 'service_id');
                $service = Service::findMany($serviceId);
            } else {
                $order = null;
                $service = null;
            }
        } elseif ($user->user_type == 2) {
            if ($user->service !== null) {
                $orders = Order::where('service_id', '=', $user->service->service_id)->get();
            } else {
                $orders = [];
            }


            if (count($orders) !== 0) {
                $order = Order::where('service_id', '=', $user->service->service_id)->where('order_status', '!=', null)->orderBy('order_pickup_date', 'desc')->orderBy('order_pickup_time', 'desc')->get();
            } else {
                $order = null;
            }

            $service = null;
        }

        if ($order === null) {
            $time = null;
        } else {
            $pickupTime = Arr::pluck($order, 'order_pickup_time');
            $timezone = 'Asia/Kuala_Lumpur';

            foreach ($pickupTime as $t)
                $time[] = Carbon::createFromTimeString($t, $timezone);
        }

        return inertia(
            'Order/Index',
            [
                'orders' => $order,
                'times' => $time,
                'services' => $service,
            ]
        );
    }

    public function create(Service $service)
    {
        $date[] = Carbon::now()->format('Y-m-d');
        for ($i = 0; $i < 13; $i++) {
            $nextDay = new Carbon(end($date));
            array_push($date, $nextDay->addDay()->format('Y-m-d'));
        }
        $time = HoursHelper::create($service->start_pickup_time, $service->end_pickup_time, 15);
        return inertia(
            'Order/Create',
            [
                'service' => $service,
                'time' => $time,
                'date' => $date
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

        $timezone = 'Asia/Kuala_Lumpur';
        $time = Carbon::createFromTimeString($order->order_pickup_time, $timezone);

        if ($order->order_status === null) {
            return inertia(
                'Order/Show',
                [
                    'order' => $order,
                    'files' => $order->file,
                    'service' => $order->service,
                    'time' => $time,
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
                    'time' => $time,
                    'page' => 'summary',
                ]
            );
        }
    }

    public function update(Order $order)
    {
        $order->order_status = 6;
        $order->save();
        return redirect()->back()->with('success', 'Order #' . $order->order_id . ' was collected!');
    }
}
