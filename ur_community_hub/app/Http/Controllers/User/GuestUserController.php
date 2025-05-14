<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CommunityRegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestUserController extends Controller
{
    public function index()
    {
        return view('user.guest-user.dashboard.index');
    }

    public function registerRequest(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'community_name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $registrationRequest = new CommunityRegistrationRequest();
        $registrationRequest->user_id = Auth::id();
        $registrationRequest->name = Auth::user()->name;
        $registrationRequest->email = Auth::user()->email;
        $registrationRequest->phone = $validated['phone'];
        $registrationRequest->community_name = $validated['community_name'];
        $registrationRequest->notes = $validated['notes'] ?? null;
        $registrationRequest->status = 'pending';
        $registrationRequest->save();

        return redirect()->back()->with('success', 'Your community registration request has been submitted successfully. We will review it and get back to you soon.');
    }
}
