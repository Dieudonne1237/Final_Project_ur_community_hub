<?php

namespace App\Http\Controllers\Community_Leader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class CommunityLeaderDashboard extends Controller
{
    public function index()
    {
        return view('user.community-leader.dashboard.index');
    }
}
