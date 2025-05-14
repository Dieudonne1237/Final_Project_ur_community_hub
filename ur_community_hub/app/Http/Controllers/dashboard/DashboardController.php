<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userRole = Auth::user()->user_role;

        if ($userRole === UserRole::UR_Community_Staff->value) {
            return redirect()->route('community-staff.dashboard');
        }

        if ($userRole === UserRole::Community_Leader->value) {
            return redirect()->route('community-leader.dashboard');
        }
        if ($userRole === UserRole::User->value) {
            return redirect()->route('guestuser.dashboard');
        }
        return redirect()->route('home');
    }
}
