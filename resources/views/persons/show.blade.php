@extends('template')
@section('content')

<section class="section-padding">
    <div class="jumbotron text-left">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class='row' style="height: 175px;">
                    <div class="col-md-12 col-sm-12">
                        {!!$person->avatar_large_link!!}
                        <h1 style="position: absolute; top:5px; left:175px; padding: 5px;"><strong><a href="{{url('person/'.$person->id.'/edit')}}">{{ $person->full_name }}</a></strong></h1>
                        
                    </div>
                </div>
            
            
                        @if ($person->is_board_member) <span class="back"><a href={{ action('PersonsController@boardmembers') }}>{!! Html::image('img/board.png', 'Board Members Group',array('title'=>"Board Members Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_captain) <span class="back"><a href={{ action('PersonsController@captains') }}>{!! Html::image('img/captain.png', 'Captains Group',array('title'=>"Captains Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_staff) <span class="back"><a href={{ action('PersonsController@staff') }}>{!! Html::image('img/employee.png', 'Staff Group',array('title'=>"Employees Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_steward) <span class="back"><a href={{ action('PersonsController@stewards') }}>{!! Html::image('img/steward.png', 'Steward Group',array('title'=>"Stewards Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_volunteer) <span class="back"><a href={{ action('PersonsController@volunteers') }}>{!! Html::image('img/volunteer.png', 'Volunteers Group',array('title'=>"Volunteers Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_retreat_director) <span class="back"><a href={{ action('PersonsController@directors') }}>{!! Html::image('img/director.png', 'Retreat Directors Group',array('title'=>"Directors Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_retreat_innkeeper) <span class="back"><a href={{ action('PersonsController@innkeepers') }}>{!! Html::image('img/innkeeper.png', 'Retreat Innkeepers Group',array('title'=>"Innkeepers Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_retreat_assistant) <span class="back"><a href={{ action('PersonsController@assistants') }}>{!! Html::image('img/assistant.png', 'Retreat Assistants Group',array('title'=>"Assistants Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_bishop) <span class="back"><a href={{ action('PersonsController@bishops') }}>{!! Html::image('img/bishop.png', 'Bishops Group',array('title'=>"Bishop Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_pastor) <span class="back"><a href={{ action('PersonsController@pastors') }}>{!! Html::image('img/pastor.png', 'Pastors Group',array('title'=>"Pastors Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_priest) <span class="back"><a href={{ action('PersonsController@priests') }}>{!! Html::image('img/priest.png', 'Priests Group',array('title'=>"Priests Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_deacon) <span class="back"><a href={{ action('PersonsController@deacons') }}>{!! Html::image('img/deacon.png', 'Deacons Group',array('title'=>"Deacons Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_provincial) <span class="back"><a href={{ action('PersonsController@provincials') }}>{!! Html::image('img/provincial.png', 'Provincials Group',array('title'=>"Provincials Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_superior) <span class="back"><a href={{ action('PersonsController@superiors') }}>{!! Html::image('img/superior.png', 'Superiors Group',array('title'=>"Superiors Group",'class' => 'btn btn-default')) !!}</a></span> @endIf
                        @if ($person->is_jesuit) <span class="back"><a href={{ action('PersonsController@jesuits') }}>{!! Html::image('img/jesuit.png', 'Jesuits Group',array('title'=>"Jesuits Group",'class' => 'btn btn-default')) !!}</a></span> @endIf                        
                        <br/>
                        <span class="btn btn-default">
                            <a href={{ action('TouchpointsController@add',$person->id) }}>Add Touch point</a>
                        </span>
                        <span class="btn btn-default">
                            <a href={{ action('RegistrationsController@add',$person->id) }}>Add Registration</a> 
                        </span>                
                    
                
            </div>
            <div class='row'>
                <div class='col-md-4'>
                <div class='panel-heading'><h2><strong>Names</strong></h2></div>
                    <div>
                        <span>
                            <strong>Title: </strong>{{ (!empty($person->prefix_name)) ? $person->prefix_name : null }} <br />
                            <strong>First Name: </strong>{{ (!empty($person->first_name)) ? $person->first_name : null }} <br /> 
                            <strong>Middle Name: </strong>{{ (!empty($person->middle_name)) ? $person->middle_name : null}} <br />
                            <strong>Last Name: </strong>{{ (!empty($person->last_name)) ? $person->last_name : null}} <br />
                            <strong>Suffix: </strong>{{$person->suffix_name}} <br />
                        </span>
                        <span>
                        <strong>Nick name:</strong> {{ (!empty($person->nick_name)) ? $person->nick_name : null }} <br />
                        <strong>Display name: </strong>{{ (!empty($person->display_name)) ? $person->display_name : null }}   <br />
                        <strong>Sort name: </strong>{{ (!empty($person->sort_name)) ? $person->sort_name : null }} <br />   
                        <strong>Contact type: </strong>{{ $person->contact_type_label }}   <br />
                        <strong>Subcontact type: </strong>{{ $person->subcontact_type_label }}   
                        </span>
                    </div>
                </div>
                <div class='col-md-4' style="background-color: lightcoral; padding: 0px;">
                    <div class="panel-heading" style="background-color: lightcoral;">
                        <h2><strong>Emergency Contact Information</strong></h2>
                    </div>    
                    <strong>Name: </strong>{{ !empty($person->emergency_contact->name) ? $person->emergency_contact->name : 'N/A' }}
                    <br /><strong>Relationship: </strong>{{ !empty($person->emergency_contact->relationship) ? $person->emergency_contact->relationship : 'N/A' }}
                    <br /><strong>Phone:</strong> {{ !empty($person->emergency_contact->phone) ? $person->emergency_contact->phone : 'N/A' }}
                    <br /><strong>Alt phone:</strong> {{ !empty($person->emergency_contact->phone_alternate) ? $person->emergency_contact->phone_alternate: 'N/A' }}
                    
                    <div class="panel-heading" style="background-color: lightcoral;">
                        <h2><strong>Health and Dietary Information</strong></h2>
                    </div>
                    <strong>Health notes: </strong>{{$person->note_health}}<br />
                    <strong>Dietary notes: </strong>{{$person->note_dietary}}   
                
                </div>               
            </div><div class="clearfix"> </div>

            <div class='row'>
                <div class='col-md-8'>
                    <div class='panel-heading'><h2><strong>Addresses</strong></h2></div>
                    @if($person->do_not_mail)
                        <div class="alert alert-warning"><strong>Do Not Mail</strong></div>
                    @endIf
                    @foreach($person->addresses as $address)
                    @if (!empty($address->street_address))
                    <strong>{{$address->location->display_name}}:</strong>
                    <address>{!!$address->google_map!!}</address>
                    @endif
                    @endforeach
                </div>
            </div>
            
            <div class='row'>
                <div class='col-md-4'>
                    <div class='panel-heading'><h2><strong>Phone Numbers</strong></h2></div>
                        @if($person->do_not_phone)
                        <div class="alert alert-warning"><strong>Do Not Call</strong></div>
                        @endIf
                        @if($person->do_not_sms)
                        <div class="alert alert-warning"><strong>Do Not Text</strong></div>
                        @endIf
                        @foreach($person->phones as $phone)
                        @if(!empty($phone->phone))
                            <strong>{{$phone->location->display_name}} - {{$phone->phone_type}}: </strong>{{$phone->phone}} {{$phone->phone_ext}}<br />
                        @endif
                            @endforeach
                </div>
                
                <div class='col-md-4'>
                    <div class='panel-heading'><h2><strong>Electronic Communications</strong></h2></div>
                        @if($person->do_not_email)
                            <div class="alert alert-warning"><strong>Do Not Email</strong></div>
                        @endIf
                        @foreach($person->emails as $email)
                        @if(!empty($email->email))
                        <strong>{{$email->location->display_name}} - Email: </strong><a href="mailto:{{$email->email}}">{{$email->email}}</a><br />
                        @endif
                        @endforeach
                        @foreach($person->websites as $website)
                        @if(!empty($website->url))
                        <strong>{{$website->website_type}} - URL: </strong><a href="{{$website->url}}" target="_blank">{{$website->url}}</a><br />
                        @endif
                        @endforeach
                </div>
            </div><div class="clearfix"> </div>

            <div class='row'><span>
                    <div class='col-md-8'>
                        <div class='panel-heading'><h2><strong>Demographics:</strong></h2></div>
                    <strong>Gender: </strong>{{$person->gender_name}}  
                    <br /><strong>Birth Date: </strong> 
                    @if (!empty($person->birth_date))
                        {{date('F d, Y', strtotime($person->birth_date))}}
                    @else 
                        N/A
                    @endif
                    
                    <br /><strong>Religion: </strong> {{ !empty($person->religion_id) ? $person->religion_name: 'N/A' }}  
                    <br /><strong>Occupation: </strong> {{ !empty($person->occupation_id) ? $person->occupation_name: 'N/A' }}  
                    <br /><strong>Ethnicity: </strong>{{ !empty($person->ethnicity_id) ? $person->ethnicity_name: 'N/A' }}    
                    <br /><strong>Parish: </strong>{!! $person->parish_link!!}
                    <br /><strong>Languages: </strong>
                        <ul>
                            @foreach($person->languages as $language)
                                <li>{{$language->label}}</li> 
                            @endforeach
                        </ul>
                    <strong>Preferred Language: </strong>
                        {{ !empty($person->preferred_language) ? $person->preferred_language_label: 'N/A' }}
                    <br />
                    <strong>Deceased?: </strong>
                    @if ($person->is_deceased>0)
                        Yes
                    @else 
                        No
                    @endIf
                    <strong>Deceased Date: </strong> 
                    @if (!empty($person->deceased_date))
                        {{date('F d, Y', strtotime($person->deceased_date))}}
                    @else 
                        N/A
                    @endif
                        
                </div>
            </div><div class="clearfix"> </div>

            <div class='row'>

                <div class='col-md-8'>
                    <div class='panel-heading'><h2><strong>Notes</strong></h2></div>
                        <strong>General Note: </strong>{{$person->note_contact}}<br />
                        <strong>Room Preference: </strong>{{$person->note_room_preference}}<br />
                </div>
                
            </div><div class="clearfix"> </div>  
            <div class='row'>
                <div class='col-md-8'>
                    <div class='panel-heading'><h2><strong>Groups</strong></h2></div>
                            <ul>
                                @foreach($person->groups as $group)
                                    <li><a href="../group/{{ $group->group_id}}">{{ $group->group->name }}</a></li>
                                @endforeach
                            </ul>
                        
                </div>
            </div>
            <div class='row'>
                <div class='col-md-8'>
                    <div class='panel-heading'>
                        <h2><strong>Relationships</strong></h2>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => ['relationship_type.addme']]) !!}
                    {!! Form::label('relationship_type', 'Add Relationship: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::select('relationship_type', $relationship_types, NULL, ['class' => 'col-md-2']) !!}
                    {!! Form::hidden('contact_id',$person->id)!!}
                    {!! Form::submit('Create relationship') !!}
                    {!! Form::close() !!}
                    
                            <ul>    
                                @foreach($person->a_relationships as $a_relationship)
                                
                                <li>{!!$person->contact_link!!} is {{ $a_relationship->relationship_type->label_a_b }} {!! $a_relationship->contact_b->contact_link !!}  </li>
                                @endforeach
                   
                                @foreach($person->b_relationships as $b_relationship)
                                <li>{!!$person->contact_link!!} is {{ $b_relationship->relationship_type->label_b_a }} {!! $b_relationship->contact_a->contact_link!!}</li>
                                @endforeach
                        
                            </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        <div class='row'>
                <div class='col-md-8'>
                    <div class='panel-heading'><h2><strong>Retreat Participation for {{ $person->display_name }}</strong></h2></div>
                            <ul>    
                                @foreach($person->event_registrations as $registration)
                                <li>{!!$registration->event_link!!} ({{date('F j, Y', strtotime($registration->event->start_date))}} - {{date('F j, Y', strtotime($registration->event->end_date))}}) - {{$registration->participant_role_name}} ({{$registration->participant_status}}) </li>
                                @endforeach
                            </ul>
                    </div>
            </div>
            <div class="clearfix"> </div>
        
        <div class='row'>
        <div class='col-md-8'>
            <div class='panel-heading'><h2><strong>Touchpoints for {{ $person->display_name }}</strong></h2>
                <span class="btn btn-default">
                   <a href={{ action('TouchpointsController@add',$person->id) }}>Add Touch point</a>
                </span>
           </div>
                @if ($person->touchpoints->isEmpty())
                        <p>It is a brand new world, there are no touch points for this person!</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Contacted by</th>
                                <th>Type of contact</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($person->touchpoints as $touchpoint)
                            <tr>
                                <td><a href="{{url('touchpoint/'.$touchpoint->id)}}">{{ $touchpoint->touched_at }}</a></td>
                                <td><a href="{{url('person/'.$touchpoint->staff->id)}}">{{ $touchpoint->staff->display_name }}</a></td>
                                <td>{{ $touchpoint->type }}</td>
                                <td>{{ $touchpoint->notes }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endif
        </div>
        </div>
        <div class='row'>
            <div class='col-md-8'>
                <div class='panel-heading'>
                    <h2><strong>Attachments for {{ $person->display_name }} </strong></h2>
                </div>
                    @if ($files->isEmpty())
                        <p>This user currently has no attachments</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Uploaded date</th>
                                    <th>MIME type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td><a href="{{url('contact/'.$person->id.'/attachment/'.$file->uri)}}">{{ $file->uri }}</a></td>
                                    <td>{{$file->description}}</td>
                                    <td>{{ $file->upload_date}}</td>
                                    <td>{{ $file->mime_type }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-1'><a href="{{ action('PersonsController@edit', $person->id) }}" class="btn btn-info">{!! Html::image('img/edit.png', 'Edit',array('title'=>"Edit")) !!}</a></div>
            @role('manager')
            <div class='col-md-1'>{!! Form::open(['method' => 'DELETE', 'route' => ['person.destroy', $person->id]]) !!}
            {!! Form::image('img/delete.png','btnDelete',['class' => 'btn btn-danger','title'=>'Delete']) !!} 
            {!! Form::close() !!}</div><div class="clearfix"> </div>
            @endrole
        </div>
    </div>
</section>
@stop