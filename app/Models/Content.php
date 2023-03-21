<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'mission_title',
        'mission_description',
        'mission_image',
        'vision_title',
        'vision_description',
        'vision_image',
    ];
}
