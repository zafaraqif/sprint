<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        Payment::create([
            ...$request->all(),
            ...$request->validate([
                'order_id' => 'required',
                'payment_type' => 'required',
            ])
        ]);

        $order = Order::find($request->order_id);
        $payment = $order->payment;

        $payment->payment_type == 1 ? $payment->payment_amount = $order->total_price : $payment->payment_amount = round($order->total_price / 2, 2);
        $payment->payment_type == 1 ? $payment->remaining_payment = 0 : $payment->remaining_payment = $order->total_price - $payment->payment_amount;
        $payment->save();

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                        'name' => 'Order #' . $request->order_id,
                        'images' => ['https://zafaraqif.com/sprint/illustration.png'],
                    ],
                    'unit_amount' =>  $payment->payment_amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success', ['order' => $order], true),
            'cancel_url' => route('checkout.failed', ['order' => $order], true),
        ]);

        $payment->session_id = $session->id;
        $payment->save();

        return Inertia::location($session->url);
    }

    public function checkout(Order $order)
    {
        Payment::create([
            'order_id' => $order->order_id,
            'payment_type' => 3,
            'payment_amount' => 0,
            'remaining_payment' => $order->total_price,
        ]);

        return redirect('/success/' . $order->order_id);
    }

    public function success(Order $order)
    {
        $files = $order->file;
        $count = 0;
        $pages = 0;
        $sheets = 0;

        foreach ($files as $file) {
            $count++;
            $pages += $file->pages_to_print;
            $sheets += $file->sheets_to_print;
        }

        $order->file_count = $count;
        $order->print_page_count = $pages;
        $order->print_sheets_count = $sheets;
        $order->order_status = 2;
        $order->save();

        if ($order->payment->payment_type == 3)
            return redirect('/home')->with('success', 'Order #' . $order->order_id . ' pending for approval.');
        else
            return redirect('/home')->with('success', 'Payment successful! Order #' . $order->order_id . ' pending for approval.');
    }

    public function failed(Order $order)
    {
        $files = $order->file;
        $count = 0;
        $pages = 0;
        $sheets = 0;

        foreach ($files as $file) {
            $count++;
            $pages += $file->pages_to_print;
            $sheets += $file->sheets_to_print;
        }

        $order->file_count = $count;
        $order->print_page_count = $pages;
        $order->print_sheets_count = $sheets;
        $order->order_status = 1;
        $order->save();
        return redirect('/home')->with('success', 'Payment failed! Order #' . $order->order_id . ' cancelled.');
    }
}



// $fileCount = $order->file->count();
        // $printPageCount = $order->file->sum('pages_to_print');
        // $printSheetsCount = $order->file->sum('sheets_to_print');

        // $order->file_count = $fileCount;
        // $order->print_page_count = $printPageCount;
        // $order->print_sheets_count = $printSheetsCount;
        // $order->save();

// if ($session->url == route('checkout.success', [], true)) {
        //     $payment = $order->payment;
        //     $price = $order->total_price;

        //     $payment->payment_type == 1 ? $payment->payment_amount = $price : $payment->payment_amount = $price / 2;
        //     $payment->payment_type == 1 ? $payment->remaining_payment = 0 : $payment->remaining_payment = $price / 2;
        //     $payment->session_id = $session->id;
        //     $payment->save();

        //     $order->order_status = 2;
        //     $order->save();
        // } else {
        //     $order->delete();
        // }