<?php

namespace LEOCORP;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['app_name','app_template','app_path','app_description',
    'app_status'];
}
