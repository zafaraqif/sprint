<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{

    public function index()
    {
        return inertia(
            'Service/Index',
            [
                'services' => Service::all()
            ]
        );
    }

    public function create()
    {
        return inertia('Service/Create');
    }

    public function store(Request $request)
    {
        Service::create([
            ...$request->all(),
            ...$request->validate([
                'sprinter_id' => 'required',
                'community_id' => 'required',
                'service_name' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'start_pickup_time' => 'required',
                'end_pickup_time' => 'required',
                'pickup_address' => 'required',
                'page_limit' => 'required|min:1',
                'price_bnw' => 'required|min:0',
                'price_color' => 'required|min:0',
                'charge_80gsm' => 'required|min:0',
            ])
        ]);
        return redirect()->route('service.index')->with('success', 'Service was created!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Service $service)
    {
        return inertia(
            'Service/Edit',
            [
                'service' => $service
            ]
        );
    }

    public function update(Request $request, Service $service)
    {
        dd($service->all());
        $service->update(
            $request->validate([
                'sprinter_id' => 'required',
                'community_id' => 'required',
                'service_name' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'start_pickup_time' => 'required',
                'end_pickup_time' => 'required',
                'pickup_address' => 'required',
                'page_limit' => 'required|min:1',
                'price_bnw' => 'required|min:0',
                'price_color' => 'required|min:0',
                'charge_80gsm' => 'required|min:0',
            ])
        );
        return redirect()->route('service.index')->with('success', 'Service was updated!');
    }

    public function destroy($id)
    {
        //
    }
}