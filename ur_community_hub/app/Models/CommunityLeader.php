<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_id',
        'user_id',
        'leader_name',
        'email',
        'phone',
        'position',
        'profile_image',
        'bio',
    ];


    public function community()
    {
        return $this->belongsTo(CommunityProfile::class, 'community_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
