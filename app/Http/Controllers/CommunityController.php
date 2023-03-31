<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Auth::user()->user_type == 2 ? $service = Auth::user()->service : $service = null;
        return inertia(
            'Community/Index',
            [
                'communities' => Community::all(),
                'service' => $service
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
        return redirect()->route('service.index')->with('success', 'Community was created!');
    }

    public function show(Community $community)
    {
        $service = Service::where('community_id', '=', $community->community_id)->get();
        return inertia(
            'Sprinter/Show',
            [
                'services' => $service
            ]
        );
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
