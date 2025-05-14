<?php

namespace App\Http\Controllers\Community_Leader;

use App\Http\Controllers\Controller;
use App\Models\CommunityProfile;
use Illuminate\Http\Request;
use App\Models\TermsAndCondition;
use Illuminate\Support\Facades\Auth;

class TermsAndConditionController extends Controller
{
    public function index()
    {
        $terms = TermsAndCondition::where('user_id', Auth::id())->first();
        return view('user.community-staff.terms-and-condition.index', compact('terms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        TermsAndCondition::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'status' => 'inactive',
        ]);

        return redirect()->back()->with('success', 'Terms and conditions added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $terms = TermsAndCondition::findOrFail($id);

        if ($terms->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $terms->update([
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Terms and conditions updated successfully.');
    }


    public function Community()
    {
        $communities = CommunityProfile::all();
        return view('user.community-staff.terms-and-condition.community', compact('communities'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:1,0',
        ]);

        $community = CommunityProfile::findOrFail($id);
        $community->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Community status updated successfully.');
    }

    public function TermAndCondition()
    {
        $terms = TermsAndCondition::first();
        return view('terms', compact('terms'));
    }

}
