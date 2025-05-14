<?php

namespace App\Livewire\Community;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CommunityProfile;
use App\Models\CommunityLeader;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CommunityCrudLivewire extends Component
{
    use WithFileUploads;

    // CommunityProfile properties
    public $community_id, $community_name, $email, $phone, $profile_image, $bio, $description, $location;
    public $facebook_links, $linkedin_links, $instagram_links, $twitter_links;
    public $updateMode = false;
    public $tempImage;
    public $community_status;
    // CommunityLeader properties
    public $leader_id, $leader_name, $leader_email, $leader_phone, $leader_position, $leader_profile_image, $leader_bio;

    public function render()
    {
        return view('livewire.community.community-crud-livewire', [
            'communities' => CommunityProfile::where('user_id', Auth::id())->get(),
            'leaders' => CommunityLeader::where('user_id', Auth::id())->get(),
        ]);
    }

    public function resetInputFields()
    {
        // Reset CommunityProfile fields
        $this->community_id = null;
        $this->community_name = '';
        $this->email = '';
        $this->phone = '';
        $this->profile_image = null;
        $this->bio = '';
        $this->description = '';
        $this->location = '';
        $this->facebook_links = '';
        $this->linkedin_links = '';
        $this->instagram_links = '';
        $this->twitter_links = '';
        $this->updateMode = false;
        $this->tempImage = null;

        // Reset CommunityLeader fields
        $this->leader_id = null;
        $this->leader_name = '';
        $this->leader_email = '';
        $this->leader_phone = '';
        $this->leader_position = '';
        $this->leader_profile_image = null;
        $this->leader_bio = '';
    }

    // CommunityProfile CRUD methods
    public function store()
    {
        $this->validate([
            'community_name' => 'required|string|max:255',
            'community_status' => 'required|in:association,club',
            'email' => 'required|email|unique:community_profiles,email',
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|max:10240',
            'bio' => 'nullable|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'facebook_links' => 'nullable|url',
            'linkedin_links' => 'nullable|url',
            'instagram_links' => 'nullable|url',
            'twitter_links' => 'nullable|url',
        ]);

        $imagePath = $this->profile_image ? $this->profile_image->store('community_profiles', 'public') : null;
        $fullImageUrl = $imagePath ? asset('storage/' . $imagePath) : null;

        CommunityProfile::create([
            'user_id' => Auth::id(),
            'community_name' => $this->community_name,
            'community_status' => $this->community_status,
            'slug' => Str::slug($this->community_name),
            'email' => $this->email,
            'phone' => $this->phone,
            'profile_image' => $fullImageUrl,
            'bio' => $this->bio,
            'description' => $this->description,
            'location' => $this->location,
            'facebook_links' => $this->facebook_links,
            'linkedin_links' => $this->linkedin_links,
            'instagram_links' => $this->instagram_links,
            'twitter_links' => $this->twitter_links,
        ]);

        $this->dispatch('show-success-message', message: 'Community Profile Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $community = CommunityProfile::findOrFail($id);
        $this->community_id = $community->id;
        $this->community_name = $community->community_name;
        $this->email = $community->email;
        $this->phone = $community->phone;
        $this->bio = $community->bio;
        $this->description = $community->description;
        $this->location = $community->location;
        $this->facebook_links = $community->facebook_links;
        $this->linkedin_links = $community->linkedin_links;
        $this->instagram_links = $community->instagram_links;
        $this->twitter_links = $community->twitter_links;
        $this->tempImage = $community->profile_image;
        $this->updateMode = true;
        $this->community_status = $community->community_status;
    }

    public function update()
    {
        $this->validate([
            'community_name' => 'required|string|max:255',
            'community_status' => 'required|in:association,club',
            'email' => 'required|email|unique:community_profiles,email,' . $this->community_id,
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|max:10240',
            'bio' => 'nullable|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'facebook_links' => 'nullable|url',
            'linkedin_links' => 'nullable|url',
            'instagram_links' => 'nullable|url',
            'twitter_links' => 'nullable|url',
        ]);

        $community = CommunityProfile::findOrFail($this->community_id);

        if ($this->profile_image) {
            $imagePath = $this->profile_image->store('community_profiles', 'public');
            $fullImageUrl = asset('storage/' . $imagePath);
            $community->profile_image = $fullImageUrl;
        }

        $community->update([
            'community_name' => $this->community_name,
            'community_status' => $this->community_status,
            'slug' => Str::slug($this->community_name),
            'email' => $this->email,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'description' => $this->description,
            'location' => $this->location,
            'facebook_links' => $this->facebook_links,
            'linkedin_links' => $this->linkedin_links,
            'instagram_links' => $this->instagram_links,
            'twitter_links' => $this->twitter_links,
        ]);

        $this->dispatch('show-success-message', message: 'Community Profile Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        CommunityProfile::findOrFail($id)->delete();
        $this->dispatch('show-success-message', message: 'Community Profile Deleted Successfully.');
    }

    // CommunityLeader CRUD methods
    public function storeLeader()
    {
        $this->validate([
            'leader_name' => 'required|string|max:255',
            'leader_email' => 'required|email|unique:community_leaders,email',
            'leader_phone' => 'nullable|string|max:20',
            'leader_position' => 'required|string|max:255',
            'leader_profile_image' => 'required|image',
            'leader_bio' => 'nullable|string',
        ]);

        $imagePath = $this->leader_profile_image ? $this->leader_profile_image->store('community_leaders', 'public') : null;
        $fullImageUrl = $imagePath ? asset('storage/' . $imagePath) : null;

        ([
            'community_id' =>Auth::user()->communityProfile->id,
            'user_id' => Auth::id(),
            'leader_name' => $this->leader_name,
            'email' => $this->leader_email,
            'phone' => $this->leader_phone,
            'position' => $this->leader_position,
            'profile_image' => $fullImageUrl,
            'bio' => $this->leader_bio,
        ]);
        CommunityLeader::create([
            'community_id' =>Auth::user()->communityProfile->id,
            'user_id' => Auth::id(),
            'leader_name' => $this->leader_name,
            'email' => $this->leader_email,
            'phone' => $this->leader_phone,
            'position' => $this->leader_position,
            'profile_image' => $fullImageUrl,
            'bio' => $this->leader_bio,
        ]);

        $this->dispatch('show-success-message', message: 'Community Leader Created Successfully.');
        $this->resetInputFields();
    }

    public function editLeader($id)
    {
        $leader = CommunityLeader::findOrFail($id);
        $this->leader_id = $leader->id;
        $this->leader_name = $leader->leader_name;
        $this->leader_email = $leader->email;
        $this->leader_phone = $leader->phone;
        $this->leader_position = $leader->position;
        $this->leader_bio = $leader->bio;
        $this->tempImage = $leader->profile_image;
        $this->updateMode = true;
    }

    public function updateLeader()
    {
        $this->validate([
            'leader_name' => 'required|string|max:255',
            'leader_email' => 'required|email|unique:community_leaders,email,' . $this->leader_id,
            'leader_phone' => 'nullable|string|max:20',
            'leader_position' => 'required|string|max:255',
            'leader_profile_image' => 'required|image',
            'leader_bio' => 'nullable|string',
        ]);

        $leader = CommunityLeader::findOrFail($this->leader_id);

        if ($this->leader_profile_image) {
            $imagePath = $this->leader_profile_image->store('community_leaders', 'public');
            $fullImageUrl = asset('storage/' . $imagePath);
            $leader->profile_image = $fullImageUrl;
        }

        $leader->update([
            'leader_name' => $this->leader_name,
            'email' => $this->leader_email,
            'phone' => $this->leader_phone,
            'position' => $this->leader_position,
            'bio' => $this->leader_bio,
        ]);

        $this->dispatch('show-success-message', message: 'Community Leader Updated Successfully.');
        $this->resetInputFields();
    }

    public function deleteLeader($id)
    {
        CommunityLeader::findOrFail($id)->delete();
        $this->dispatch('show-success-message', message: 'Community Leader Deleted Successfully.');
    }
}
