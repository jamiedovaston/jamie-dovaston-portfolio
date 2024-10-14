<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'logos', 'short_description', 'body', 'user_id', 'finished_at', 'unity_game_path', 'video_path'
    ];

    protected $casts = [
        'logos' => 'array',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
