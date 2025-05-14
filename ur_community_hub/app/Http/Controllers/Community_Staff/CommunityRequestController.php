<?php

namespace App\Http\Controllers\Community_staff;

use App\Http\Controllers\Controller;
use App\Models\CommunityRegistrationRequest;
use Illuminate\Http\Request;
use App\Mail\CommunityApprovalMail;
use Illuminate\Support\Facades\Mail;
use App\Models\MemberRequest;

class CommunityRequestController extends Controller
{
    public function index()
    {
        $requests = CommunityRegistrationRequest::orderBy('created_at', 'desc')->get();
        return view('user.community-staff.community-requests.index', compact('requests'));
    }

    public function show($id)
    {
        $request = CommunityRegistrationRequest::findOrFail($id);
        return view('user.community-staff.community-requests.show', compact('request'));
    }

    public function approve($id, Request $request)
    {
        // Validate admin_notes if present
        $request->validate([
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        // Find the registration request or fail
        $registrationRequest = CommunityRegistrationRequest::findOrFail($id);

        // Update the request status and notes
        $registrationRequest->update([
            'status' => 'approved',
            'admin_notes' => $request->admin_notes,
        ]);

        // Update the user role if user is attached to the request
        if ($registrationRequest->user) {
            $registrationRequest->user->update([
                'user_role' => \App\Enums\UserRole::Community_Leader->value,
            ]);

            // Send approval email
            Mail::to($registrationRequest->email)->send(new CommunityApprovalMail($registrationRequest));
        }

        return redirect()->back()->with('success', 'Community registration request approved and user role updated.');
    }

    public function reject($id, Request $request)
    {
        $registrationRequest = CommunityRegistrationRequest::findOrFail($id);
        $registrationRequest->status = 'rejected';
        $registrationRequest->admin_notes = $request->admin_notes;
        $registrationRequest->save();

        return redirect()->back()->with('success', 'Community registration request has been rejected.');
    }

    // public function destroy($id, Request $request)
    // {
    //     $communityRequest = CommunityRequest::findOrFail($id);

    //     // Optionally, save admin notes before deleting
    //     if ($request->has('admin_notes')) {
    //         $communityRequest->admin_notes = $request->admin_notes;
    //         $communityRequest->save(); // Save notes before deletion
    //     }

    //     $communityRequest->delete();

    //     return redirect()->route('community-staff.dashboard')->with('success', 'Request deleted successfully.');
    // }
}
