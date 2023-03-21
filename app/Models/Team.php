<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'designation',
        'person_image',
        'description',
        'facebook_URL',
        'instagram_URL',
        'linkedin_URL',


    ];
}
