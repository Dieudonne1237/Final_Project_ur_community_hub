<?php

namespace App\Http\Controllers\User\Community_Leader;

use App\Http\Controllers\Controller;
use App\Models\MemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // ✅ Import Mail facade
use App\Mail\MemberRequestApproved;  // ✅ Import the mailable for approval
use App\Mail\MemberRequestRejected;  // ✅ Import the mailable for rejection

class MemberRequestControlller extends Controller
{
    public function index()
    {
        $communityId = Auth::user()->communityProfile->id;

        $memberRequests = MemberRequest::where('community_id', $communityId)
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        return view('user.community-leader.member-request.index', compact('memberRequests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'community_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'year_of_study' => 'nullable|integer',
            'department' => 'nullable|string|max:255',
            'reason' => 'required|string',
            'terms_agreed' => 'required|accepted',
        ]);

        MemberRequest::create([
            'community_id' => $validated['community_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'year_of_study' => $validated['year_of_study'],
            'department' => $validated['department'] ?? null,
            'reason' => $validated['reason'],
            'terms_agreed' => true,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your membership request has been submitted successfully. You will be notified via email when your request is processed.');
    }

    public function approve($id, Request $request)
    {
        $memberRequest = MemberRequest::findOrFail($id);

        $memberRequest->update([
            'status' => 'approved',
            'admin_notes' => $request->input('admin_notes')
        ]);
        

        Mail::to($memberRequest->email)->send(new MemberRequestApproved($memberRequest));

        return redirect()->back()->with('success', 'Member request approved and email sent.');
    }

    public function reject($id, Request $request)
    {
        $memberRequest = MemberRequest::findOrFail($id);

        $memberRequest->update([
            'status' => 'rejected',
            'admin_notes' => $request->input('admin_notes')
        ]);

        Mail::to($memberRequest->email)->send(new MemberRequestRejected($memberRequest));

        return redirect()->back()->with('success', 'Member request rejected and email sent.');
    }

    public function destroy($id)
{
    $request = MemberRequest::findOrFail($id);
    $request->delete();

    return redirect()->back()->with('success', 'Member request deleted successfully.');
}

public function show($id)
{
    $request = MemberRequest::findOrFail($id);
    return view('user.community-leader.member-request.show', compact('request'));
}

}
