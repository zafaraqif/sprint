<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use CArbon\Carbon;

class AccountController extends Controller
{
    public function index()
    {
        (Auth::user()->user_type == 1) ? $service = null : $service = Auth::user()->service;
        ($service == null) ? $community = null : $community = $service->community;

        $timezone = 'Asia/Kuala_Lumpur';
        if ($service == null) {
            $times[] = 0;
        } else {
            $times[0] = Carbon::createFromTimeString($service->start_time, $timezone);
            $times[1] = Carbon::createFromTimeString($service->end_time, $timezone);
            $times[2] = Carbon::createFromTimeString($service->start_pickup_time, $timezone);
            $times[3] = Carbon::createFromTimeString($service->end_pickup_time, $timezone);
        }

        return inertia(
            'Profile/Index',
            [
                'service' => $service,
                'community' => $community,
                'times' => $times
            ]
        );
    }

    public function create()
    {
        return inertia('Auth/Register');
    }

    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'user_type' => 'required',
            'phone_number' => 'required',
        ]));
        Auth::login($user);

        return redirect('/home')->with('success', 'Account created!');
    }

    public function update(Request $request, User $account)
    {
        $account->update(
            $request->validate([
                'password' => 'required|min:8|confirmed',
            ])
        );
        $account->save();
        return redirect()->back()->with('success', 'Password changed!');
    }
}
