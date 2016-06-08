<?php

namespace montserrat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupContact extends Model
{
    use SoftDeletes;
    protected $table = 'group_contact';
    
    public function group() {
        return $this->belongsTo('\montserrat\Group','group_id','id');
    }
    public function contact() {
        return $this->belongsTo('\montserrat\Contact','contact_id','id');
    }
    
}