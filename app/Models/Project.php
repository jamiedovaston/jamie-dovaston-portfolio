<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'images', 'video_path', 'short_description', 'background_image',
        'background_primary_color', 'article_color', 'software', 'shortline_description', 'body', 'user_id'
    ];

    protected $casts = [
        'images' => 'array',
        'software' => 'array',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
