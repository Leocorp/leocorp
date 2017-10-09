<?php

namespace LEOCORP;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image_path','image_title','image_description',
    'image_status'];
    
    
}
