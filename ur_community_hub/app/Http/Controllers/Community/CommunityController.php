<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\CommunityProfile;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        return view('user.community-leader.Community.index');
    }

    public function show($id)
    {
        $community = CommunityProfile::with(['user', 'events'])->findOrFail($id);

        return view('user.community-leader.Community.show', compact('community'));
    }

}
