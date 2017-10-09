<?php

namespace LEOCORP;

use Illuminate\Database\Eloquent\Model;

class VTour extends Model
{
    protected $fillable = ['vtour_title', 'vtour_path',
    'vtour_description', 'vtour_status', 'vtour_template'];
    
    public function vcat()
    {
	    return $this->belongsTo(VCategory::class);
    }
}
