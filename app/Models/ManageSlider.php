<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageSlider extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'button_text',
        'button_url',
    ];
  
}
