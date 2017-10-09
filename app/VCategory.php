<?php

namespace LEOCORP;

use Illuminate\Database\Eloquent\Model;

class VCategory extends Model
{
    protected $fillable = ['vcat_name','vcat_description','vcat_status'];
    
    public function vtours()
    {
	    return $this->hasMany(VTour::class)->orderBy('created_at','desc');
    }
}
