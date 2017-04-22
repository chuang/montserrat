<?php

namespace montserrat;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Html;

class Retreat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    use SoftDeletes;
    
    protected $table = 'event';

    protected $dates = ['start_date', 'end_date', 'created_at', 'updated_at', 'disabled_at', 'deleted_at'];  //
    
    public function setStartDateAttribute($date)
    {
        $this->attributes['start_date'] = Carbon::parse($date);
    }
    
    public function setEndDateAttribute($date)
    {
        $this->attributes['end_date'] = Carbon::parse($date);
    }
    
    public function getRegistrationCountAttribute()
    {
        // keep in mind that if/when innkeeper and other not retreatant roles are added will not to use where clause to keep the count accurate and exclude non-participating participants
        return $this->registrations->count();
    }

    public function getRetreatantCountAttribute()
    {
        // keep in mind that if/when innkeeper and other not retreatant roles are added will not to use where clause to keep the count accurate and exclude non-participating participants
        return $this->retreatants->count();
    }

    public function assistant()
    {
        return $this->belongsTo(Contact::class, 'assistant_id', 'id')->whereContactType(CONTACT_TYPE_INDIVIDUAL);
    }
    public function captains()
    {
        // TODO: handle with participants of role Retreat Director or Master - be careful with difference between (registration table) retreat_id and (participant table) event_id
        return $this->belongsToMany(Contact::class, 'captain_retreat', 'event_id', 'contact_id')->whereContactType(CONTACT_TYPE_INDIVIDUAL);
    }
    
    public function innkeeper()
    {
        return $this->belongsTo(Contact::class, 'innkeeper_id', 'id')->whereContactType(CONTACT_TYPE_INDIVIDUAL);
    }
    public function event_type()
    {
        return $this->hasOne(EventType::class, 'id', 'event_type_id');
    }
    
    public function retreatmasters()
    {
        // TODO: handle with participants of role Retreat Director or Master - be careful with difference between (registration table) retreat_id and (participant table) event_id
        return $this->belongsToMany(Contact::class, 'retreatmasters', 'retreat_id', 'person_id')->whereContactType(CONTACT_TYPE_INDIVIDUAL);
    }
    
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'event_id', 'id');
    }

    public function retreatants()
    {
        return $this->registrations()->whereCanceledAt(null);
    }
    public function getEmailRegisteredRetreatantsAttribute()
    {
        $bcc_list = '';
        foreach ($this->registrations as $registration) {
            if (!empty($registration->retreatant->email_primary_text) && is_null($registration->canceled_at)) {
                $bcc_list .= $registration->retreatant->email_primary_text.',';
            }
        }
        return "mailto:?bcc=".$bcc_list;
    }
    public function getRetreatTypeAttribute()
    {
        //dd($this->event_type);
        if (isset($this->event_type)) {
            return $this->event_type->name;
        } else {
            return null;
        }
    }
    public function getRetreatScheduleLinkAttribute()
    {
        if (Storage::has('event/'.$this->id.'/schedule.pdf')) {
            $img = Html::image('img/schedule.png', 'Schedule', array('title'=>"Schedule"));
            $link = '<a href="'.url('retreat/'.$this->id.'/schedule" ').'class="btn btn-default" style="padding: 3px;">'.$img.'</a>';
            return $link;
        } else {
            return null;
        }
    }
    
    public function getRetreatContractLinkAttribute()
    {
        if (Storage::has('event/'.$this->id.'/contract.pdf')) {
            $img = Html::image('img/contract.png', 'Contract', array('title'=>"Contract"));
            $link = '<a href="'.url('retreat/'.$this->id.'/contract" ').'class="btn btn-default" style="padding: 3px;">'.$img.'</a>';
            return $link;
        } else {
            return null;
        }
    }
    
    public function getRetreatEvaluationsLinkAttribute()
    {
        if (Storage::has('event/'.$this->id.'/evaluations.pdf')) {
            $img = Html::image('img/evaluation.png', 'Evaluations', array('title'=>"Evaluations"));
            $link = '<a href="'.url('retreat/'.$this->id.'/evaluations" ').'class="btn btn-default" style="padding: 3px;">'.$img.'</a>';
            return $link;
        } else {
            return null;
        }
    }
    
    public function getRetreatTeamAttribute()
    {
        $team = '';
        $directors = $this->retreatmasters()->get();
        //dd($directors);
        foreach ($directors as $director) {
            // dd($director);
            $team .= $director->last_name.'(D) ';
        }
        $innkeeper = $this->innkeeper()->first();
        //dd($innkeeper->last_name);
        if (isset($innkeeper->last_name)) {
            $team .= $innkeeper->last_name.'(I) ';
        }
        $assistant = $this->assistant()->first();
        if (isset($assistant->last_name)) {
            $team .= $assistant->last_name.'(A) ';
        }
        return $team;
    }
    /*
     * Returns an array of attendee email addresses to be added to a Google Calendar event
     * see https://developers.google.com/google-apps/calendar/create-events (for PHP section)
     *  'attendees' => array(
            array('email' => 'lpage@example.com'),
            array('email' => 'sbrin@example.com'),
        )
     */
    public function getRetreatAttendeesAttribute()
    {
        $attendees = [];
        $directors = $this->retreatmasters()->get();
        //dd($directors);
        foreach ($directors as $director) {
            if (!empty($director->email_primary->email)) {
                array_push($attendees, array('email'=>$director->email_primary->email));
            }
        }
        $innkeeper = $this->innkeeper()->first();
        //dd($innkeeper->last_name);
        if (!empty($innkeeper->email_primary->email)) {
            array_push($attendees, array('email'=>$innkeeper->email_primary->email));
        }
        $assistant = $this->assistant()->first();
        if (!empty($assistant->email_primary->email)) {
            array_push($attendees, array('email'=>$assistant->email_primary->email));
        }
        return $attendees;
    }
    
    public function scopeType($query, $event_type_id)
    {
        return $query->where('event_type_id', $event_type_id);
    }
}
