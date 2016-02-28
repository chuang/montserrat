<?php

namespace montserrat;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    //
    use SoftDeletes;
    protected $table = 'persons';
    protected $dates = ['dob', 'created_at', 'updated_at', 'deleted_at']; 
    
    public function setDobAttribute($date) {
        if (strlen($date)) {
            $this->attributes['dob'] = Carbon::parse($date);
        } else {
            $this->attributes['dob'] = null;
        }
    }
    
    public function parish() {
        return $this->belongsTo('\montserrat\Parish','parish_id','id');
    }
    
    public function touchpoints() {
        return $this->hasMany('\montserrat\Touchpoint','person_id','id');
    }
    
    public function retreatmasters() {
        return $this->belongsToMany('\montserrat\Retreat','retreatmasters','person_id','retreat_id');
    }
    
}
