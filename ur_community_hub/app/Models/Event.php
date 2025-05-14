<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_id',
        'title',
        'slug',
        'description',
        'event_date',
        'location',
        'image',
        'status', 
    ];

    public function community()
    {
        return $this->belongsTo(CommunityProfile::class, 'community_id');
    }
}
