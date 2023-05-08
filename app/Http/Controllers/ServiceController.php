<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Community;
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
            return redirect('/community');
        } else {
            $id = $service->service_id;
            return redirect('/service/' . $id . '/edit');
        }
    }

    public function create(Community $community)
    {
        return inertia(
            'Service/Create',
            [
                'community' => $community
            ]
        );
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

        $service = Service::where('user_id', '=', $request->user_id)->first();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        if (date("H:i:s") >= $request->start_time && date("H:i:s") <= $request->end_time) {
            $service->service_status = 1;
            $service->save();
        } else {
            $service->service_status = 0;
            $service->save();
        }

        return redirect()->route('account.index')->with('success', 'Service was created!');
    }

    public function edit(Service $service)
    {
        return inertia(
            'Service/Edit',
            [
                'service' => $service,
                'community' => $service->community
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
        return redirect()->back()->with('success', $service->service_name . ' was updated!');
    }

    public function change(Service $service, Community $community)
    {
        $service->community_id = $community->community_id;
        $service->save();
        return redirect('service/' . $service->service_id . '/edit')->with('success', 'Community changed!');
    }
}
