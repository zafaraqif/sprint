<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        return inertia(
            'Community/Index',
            [
                'communities' => Community::all()
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

    public function show($id)
    {
        //
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
