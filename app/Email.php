<?php

namespace montserrat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
    
class Email extends Model
{
    use SoftDeletes;
    protected $table = 'email';
    protected $fillable =  ['contact_id', 'location_type_id', 'is_primary', 'email'];
    
    public function owner() {
        return $this->belongsTo('\montserrat\Person','contact_id','id');
    }
    
    public function location() {
        return $this->belongsTo('\montserrat\LocationType','location_type_id','id');
    }
    
}