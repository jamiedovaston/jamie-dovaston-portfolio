<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    // Define the table associated with the model (if not following the default naming convention)
    protected $table = 'about_me';

    // Specify which fields are fillable
    protected $fillable = [
        'title',
        'content',
    ];
}
