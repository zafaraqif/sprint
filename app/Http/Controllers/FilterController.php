<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class FilterController extends Controller
{
    public function store(Request $request)
    {
        $state = $request->state;
        Auth::user()->user_type == 2 ? $service = Auth::user()->service : $service = null;
        $communities = Community::where('state', '=', $state)->get();
        $total = $communities->count();

        $communityId = Arr::pluck($communities, 'community_id');
        foreach ($communityId as $id) {
            $sprinter[] = Service::where('community_id', '=', $id)->where('service_status', '=', 1)->count();
        }

        if ($communityId == null) {
            $sprinter = 0;
            $total = 0;
        }

        return inertia(
            'Community/Index',
            [
                'communities' => $communities,
                'service' => $service,
                'total' => $total,
                'sprinter' => $sprinter
            ]
        );
    }
}
