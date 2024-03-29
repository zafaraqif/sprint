<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $keyword = $request->search;
        Auth::user()->user_type == 2 ? $service = Auth::user()->service : $service = null;
        $communities = Community::where('community_name', 'like', '%' . $keyword . '%')->orWhere('locality', 'like', '%' . $keyword . '%')->orWhere('district', 'like', '%' . $keyword . '%')->orWhere('state', 'like', '%' . $keyword . '%')->orderBy('community_name')->get();
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
