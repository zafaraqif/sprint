<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Service::class, 'service');
    }

    public function index()
    {
        $user = Auth::user();
        $service = $user->service;

        if (!$user->service) {
            return redirect('/service/create');
        } else {
            $id = $service->service_id;
            return redirect('/service/' . $id . '/edit');
        }
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
                'user_id' => 'required',
                'community_id' => 'required',
                'service_name' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'start_pickup_time' => 'required',
                'end_pickup_time' => 'required',
                'pickup_address' => 'required',
                'contact_number' => 'required',
                'page_limit' => 'required|min:1',
                'price_bnw' => 'required|min:0',
                'price_color' => 'required|min:0',
                'charge_80gsm' => 'required|min:0',
            ])
        ]);
        return redirect()->route('service.index')->with('success', 'Service was created!');
    }

    public function show(Service $service)
    {
        return inertia(
            'Service/Show',
            [
                'service' => $service
            ]
        );
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
        $service->update(
            $request->validate([
                'user_id' => 'required',
                'community_id' => 'required',
                'service_name' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'start_pickup_time' => 'required',
                'end_pickup_time' => 'required',
                'pickup_address' => 'required',
                'contact_number' => 'required',
                'page_limit' => 'required|min:1',
                'price_bnw' => 'required|min:0',
                'price_color' => 'required|min:0',
                'charge_80gsm' => 'required|min:0',
            ])
        );
        return redirect()->back()->with('success', 'Service was updated!');
    }

    public function destroy($id)
    {
        //
    }
}
