<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CommunityProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'community_name', 'slug', 'email', 'phone', 'profile_image', 'bio', 'description', 'location', 'facebook_links', 'linkedin_links', 'instagram_links', 'twitter_links', 'status','community_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // In CommunityProfile.php
    public function events()
    {
        return $this->hasMany(Event::class, 'community_id');
    }

    public function leaders()
    {
        return $this->hasMany(CommunityLeader::class, 'community_id');
    }
}
