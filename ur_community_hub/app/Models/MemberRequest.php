<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_id',
        'name',
        'email',
        'phone',
        'year_of_study',
        'department',
        'reason',
        'terms_agreed',
        'status',
        'admin_notes', 
    ];
    
    

    protected $casts = [
        'terms_agreed' => 'boolean',
    ];

    public function community()
    {
        return $this->belongsTo(CommunityProfile::class, 'community_id');
    }
}
