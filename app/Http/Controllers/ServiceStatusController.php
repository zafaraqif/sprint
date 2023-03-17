<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceStatusController extends Controller
{
    public function open(Service $service)
    {
        $service->service_status = 1;
        $service->save();
        return redirect()->back()->with('success', 'Service opened!');
    }

    public function close(Service $service)
    {
        $service->service_status = 0;
        $service->save();
        return redirect()->back()->with('success', 'Service closed!');
    }
}
