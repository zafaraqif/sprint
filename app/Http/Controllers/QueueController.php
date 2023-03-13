<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class QueueController extends Controller
{
    public function index()
    {
        return inertia(
            'Queue/Index',
            [
                'message' => 'Your Queue'
            ]
        );
    }

    public function show()
    {
    }
}
