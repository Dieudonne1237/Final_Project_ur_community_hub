<?php

namespace App\Http\Controllers\Community_Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class CommunityStaffDashboard extends Controller
{
    public function index()
    {
        return view('user.community-staff.dashboard.index');
    }
}
