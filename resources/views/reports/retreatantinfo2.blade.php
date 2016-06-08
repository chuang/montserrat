@extends('report')

@section('content')

@foreach($registrations as $registration)
    <h2>Retreatant Information for Retreat {{$registration->retreat->title}}</h2> 


<i>Please review the information below for accuracy and make changes as appropriate.</i>
<table width="100%">
    <tr>
        <td>
            <h2>Name and Address</h2>
        </td>
    </tr>
    <tr>
        <td><strong>{{$registration->retreatant->prefix_name}} {{$registration->retreatant->display_name}} {{$registration->retreatant->suffix_name}}</strong></td>
        <td><hr/></td>
    </tr>
    <tr>
        <td><strong>{{$registration->retreatant->address_primary->street_address}}</strong></td>
        <td><hr/></td>
    </tr>
    <tr>
        <td><strong>{{$registration->retreatant->address_primary->city}}, {{$registration->retreatant->address_primary->state->abbreviation}}  {{$registration->retreatant->address_primary->postal_code}}</strong></td>
        <td><hr/></td>
    </tr>
   
    <tr>
        <td>
            <h2>Phone numbers</h2>
        </td>
    </tr>
    <tr>
        <td><strong>Home phone: </strong>{{$registration->retreatant->phone_home_phone_number}}</td>
        <td><hr/></td>
    </tr>
    <tr>
        <td><strong>Mobile phone: </strong>{{$registration->retreatant->phone_home_mobile_number}}</td>
        <td><hr/></td>
    </tr>
    <tr>
        <td><strong>Work phone: </strong>{{$registration->retreatant->phone_work_phone_number}}</td>
        <td><hr/></td>
    </tr>
    <tr>
        <td>
            <h2>Email addresses</h2>
        </td>
    </tr>
    
    @foreach ($registration->retreatant->emails as $email)
    <tr>
        <td><strong>{{$email->location->name}} - Email:</strong>{{$email->email}}</td>  
        <td><hr/></td>
    </tr>  
    @endforeach
    <tr>
        <td><strong>Preferred contact method:</strong> {{$registration->retreatant->preferred_communication_method}} <br />(Email, Cell, Home, Work, Mail, etc.)</td>  
        <td><hr/></td>
    </tr>    
    <tr><td> </td></tr>
    <tr><td><h2>Emergency Contact Information</h2></td></tr>
    
    <tr>
        <td><strong>Name:</strong>{{$registration->retreatant->emergency_contact->name}}</td>
        <td><hr/></td>
    </tr>
    <tr>
        <td><strong>Relationship: </strong>{{$registration->retreatant->emergency_contact->relationship}}<br /></td>
        <td><hr/></td>
    </tr>
    <tr>
        <td><strong>Phone #:</strong>{{$registration->retreatant->emergency_contact->phone}}</td>
        <td><hr/></td>
    </tr>
<tr>
        <td><strong>Alternate Phone #:</strong>{{$registration->retreatant->emergency_contact->phone_alternate}}</td>
        <td><hr/></td>
    </tr>    
    <tr>
        <td>
            <h2>Demographics</h2>
        </td>
    </tr>
    <tr>    
        <td><strong>Gender:</strong>{{$registration->retreatant->gender_name}}</td>
        <td><hr/></td>
    </tr>
    
    <tr>    
        <td><strong>Date of Birth:</strong>{{$registration->retreatant->birth_date}}</td>
        <td><hr/></td>
    </tr>
    <tr>
        <td><strong>Parish (Location):</strong>
            {{$registration->retreatant->parish_name}}
            <br />(If not Catholic, please indicate religious affiliation)</td>
        <td><hr/></td>
    </tr>    

    <tr>
        <td><strong>Occupation:</strong>{{$registration->retreatant->occupation->name}}</td>
        <td><hr/></td>
        
    </tr>    
    <tr>
        <td><strong>Ethnicity:</strong>{{$registration->retreatant->ethnicity_name}}</td>
        <td><hr/></td>
        
    </tr>    
    <tr>
        <td><strong>Languages spoken:</strong>
            @foreach ($registration->retreatant->languages as $language)
                {{$language->label}} 
            @endforeach
        </td>
        <td><hr/></td>
        
    </tr>    
    
    <tr>
        <td><strong>Room Preference: </strong>{{$registration->retreatant->note_room_preference_text}}</td>
        <td><hr/></td>
        
    </tr>
    <tr>
        <td>
            <h2>Notes</h2>
        </td>
    </tr>
    <tr>
        <td class='box'><strong>Dietary notes:</strong>{{$registration->retreatant->note_dietary_text}}</td>
        <td class='box'><strong>Health notes:</strong>{{$registration->retreatant->note_health_text}}</td>

    </tr>    
    
</table>
<strong>Additional Notes:</strong><br /><br />


        <span class="logo">
            {!! Html::image('img/mrhlogoblack.png','Home',array('title'=>'Home','class'=>'logo','align'=>'right')) !!}
       
        </span>    
    <span class='pagefooter'>
                600 N Shady Shores Drive<br />
                Lake Dallas, TX 75065<br />
                (940) 321-6020<br /> 
            <a href='http://montserratretreat.org/' target='_blank'>montserratretreat.org</a>
        
    </span>
<div class="page-break"></div>
@endforeach