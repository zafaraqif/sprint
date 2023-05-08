<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class CommunityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Auth::user()->user_type == 2 ? $service = Auth::user()->service : $service = null;
        $community = Community::orderBy('community_name')->get();
        $communityId = Arr::pluck($community, 'community_id');
        foreach ($communityId as $id) {
            $sprinter[] = Service::where('community_id', '=', $id)->where('service_status', '=', 1)->count();
        }

        if ($communityId == null) {
            $sprinter = 0;
        }

        return inertia(
            'Community/Index',
            [
                'communities' => $community,
                'service' => $service,
                'sprinter' => $sprinter
            ]
        );
    }

    public function create()
    {
        return inertia('Community/Create');
    }

    public function store(Request $request)
    {
        Community::create([
            ...$request->all(),
            ...$request->validate([
                'community_name' => 'required',
                'locality' => 'required',
                'district' => 'required',
                'state' => 'required',
            ])
        ]);
        return redirect()->route('community.index')->with('success', 'Community was created!');
    }

    public function show(Community $community)
    {
        $service = Service::where('community_id', '=', $community->community_id)->where('service_status', '=', 1)->get();
        $start = Arr::pluck($service, 'start_time');
        $end = Arr::pluck($service, 'end_time');

        $timezone = 'Asia/Kuala_Lumpur';
        foreach ($start as $s)
            $startTime[] = Carbon::createFromTimeString($s, $timezone);
        foreach ($end as $e)
            $endTime[] = Carbon::createFromTimeString($e, $timezone);

        return inertia(
            'Sprinter/Show',
            [
                'services' => $service,
                'start' => $startTime,
                'end' => $endTime,
            ]
        );
    }
}
