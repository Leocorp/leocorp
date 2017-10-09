<?php

namespace LEOCORP;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_title','project_template',
    'project_description','project_status'];
}
