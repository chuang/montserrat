@extends('template')
@section('content')

<section class="section-padding">
    <div class="jumbotron text-left">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    Retreat {!!Html::link(url('retreat/'.$retreat->id.'/edit'),$retreat->idnumber.' - '.$retreat->title)!!} 
                </h2>
                {!! Html::link('#registrations','Registrations',array('class' => 'btn btn-default')) !!}
                {!! Html::link(url('retreat'),'Retreat index',array('class' => 'btn btn-default')) !!}
            
            </div>
            <div class='row'>
                <div class='col-md-2'><strong>ID#: </strong>{{ $retreat->idnumber}}</div>
            </div><div class="clearfix"> </div>
            <div class='row'>
                <div class='col-md-3'><strong>Starts: </strong>{{date('F j, Y g:i A', strtotime($retreat->start_date))}}</div>
                <div class='col-md-3'><strong>Ends: </strong>{{date('F j, Y g:i A', strtotime($retreat->end_date))}}</div>
            </div><div class="clearfix"> </div>
            <div class='row'>
                <div class='col-md-3'><strong>Title: </strong>{{ $retreat->title}}</div>
                <div class='col-md-3'><strong>Attending: </strong>{{ $retreat->retreatant_count}}</div>
            </div><div class="clearfix"> </div>
            <div class='row'>
                <div class='col-md-6'><strong>Description: </strong>{{ $retreat->description}}</div>
            </div><div class="clearfix"> </div>
            <div class='row'>
                <div class='col-md-1'><strong>Director(s): </strong></div>
                    @if ($retreat->retreatmasters->isEmpty())
                        N/A
                    @else
                    <div class='col-md-2'>
                        @foreach($retreat->retreatmasters as $rm)
                            <a href="{{url('person/'.$rm->id)}}">{{ $rm->display_name }}</a><br /> 
                        @endforeach
                        </div>
                    @endif
    
                <div class='col-md-3'><strong>Innkeeper: </strong>
                    @if ($retreat->innkeeper_id > 0)
                        <a href="{{url('person/'.$retreat->innkeeper_id)}}">{{ $retreat->innkeeper->display_name }}</a>
                    @else
                        N/A
                    @endIf
                </div>
                <div class='col-md-3'><strong>Assistant: </strong>
                    @if ($retreat->assistant_id > 0)
                        <a href="{{url('person/'.$retreat->assistant_id) }}">{{ $retreat->assistant->display_name }}</a>
                    @else
                        N/A
                    @endIf
                </div>

            </div><div class="clearfix"> </div>
            <div class='row'>
                <div class='col-md-1'><strong>Captain(s): </strong></div>
                    @if ($retreat->captains->isEmpty())
                        N/A
                    @else
                    <div class='col-md-2'>
                        @foreach($retreat->captains as $captain)
                            <a href="/person/{{ $captain->id }}">{{ $captain->display_name }}</a><br /> 
                        @endforeach
                    </div>
                    @endif
            </div>
            <div class='row'>
                <div class='col-md-3'><strong>Type: </strong>{{ $retreat->retreat_type}}</div>
                <div class='col-md-3'><strong>Silent: </strong>{{ $retreat->silent}}</div>
                <div class='col-md-3'><strong>Donation: </strong>{{ $retreat->amount}}</div>
            </div><div class="clearfix"> </div>
            <div class='row'>
                <div class='col-md-2'><strong>Year: </strong>{{ $retreat->year}}</div>
            </div><div class="clearfix"> </div>
            <div class='row'>
                <div class="col-md-1">
                    <strong>Attachments: </strong>
                </div>
                <div class="col-md-2">
                    {!!$retreat->retreat_contract_link!!}
                    {!!$retreat->retreat_schedule_link!!}
                    {!!$retreat->retreat_evaluations_link!!}
                </div>
                    
            </div>
            <div class="clearfix"> </div>
            <div class='row'>
                
                @if (Storage::has('event/'.$retreat->id.'/group_photo.jpg'))
                    <div class='col-md-1'>
                        <strong>Group photo:</strong> 
                    </div>
                    <div class='col-md-8'>
                        <img src="{{url('retreat/'.$retreat->id).'/photo'}}" class="img" style="padding:5px; width:75%">
                    </div>
                @endif
                        
            </div><div class="clearfix"> </div>
                
        </div>
            <div class='row'>
                <div class='col-md-1'><a href="{{ action('RetreatsController@edit', $retreat->id) }}" class="btn btn-info">{!! Html::image('img/edit.png', 'Edit',array('title'=>"Edit")) !!}</a></div>
                <div class='col-md-1'>{!! Form::open(['method' => 'DELETE', 'route' => ['retreat.destroy', $retreat->id],'onsubmit'=>'return ConfirmDelete()']) !!}
                {!! Form::image('img/delete.png','btnDelete',['class' => 'btn btn-danger','title'=>'Delete']) !!} 
                {!! Form::close() !!}</div><div class="clearfix"> </div>
            </div><br />
        <div class="panel panel-default">  
        <div class="panel-heading" id='registrations'>
            <h2>Retreatants Registered for {!!Html::link(url('retreat/'.$retreat->id.'/edit'),$retreat->idnumber.' - '.$retreat->title)!!} </h2>
            {!! Html::link(action('RegistrationsController@register',$retreat->id),'Register a retreatant',array('class' => 'btn btn-default'))!!}
            {!! Html::link($retreat->email_registered_retreatants,'Email registered retreatants',array('class' => 'btn btn-default'))!!}
            {!! Html::link(action('RetreatsController@assign_rooms',$retreat->id),'Assign rooms',array('class' => 'btn btn-default'))!!}
            {!! Html::link(action('RetreatsController@checkout',$retreat->id),'Checkout',array('class' => 'btn btn-default'))!!}
            {!! Html::link(action('PagesController@retreatantinforeport',$retreat->idnumber),'Retreatant information report',array('class' => 'btn btn-default'))!!}
            {!! Html::link(action('PagesController@retreatrosterreport',$retreat->idnumber),'Retreat roster',array('class' => 'btn btn-default'))!!}
            {!! Html::link(action('PagesController@retreatlistingreport',$retreat->idnumber),'Retreat listing',array('class' => 'btn btn-default'))!!}
            {!! Html::link(action('TouchpointsController@add_retreat',$retreat->id),'Retreat touchpoint',array('class' => 'btn btn-default'))!!}
                
        </div>
            @if ($registrations->isEmpty())
                <p> Currently, there are no registrations for this retreats</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Date Registered</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Deposit</th>
                        <th>Mobile Phone</th>
                        <th>Parish</th>
                        <th>Notes</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($registrations as $registration)
                    <tr>
                        <td id='registration-{{$registration->id}}'><a href="{{action('RegistrationsController@show', $registration->id)}}">{{ date('F d, Y', strtotime($registration->register_date)) }}</a></td>
                        <td>{!!$registration->retreatant->avatar_small_link!!}</td>
                        <td>{!!$registration->retreatant->contact_link!!}</td>
                        <td>
                            @if (empty($registration->room->name))
                                N/A
                            @else
                            <a href="{{action('RoomsController@show', $registration->room->id)}}">{{ $registration->room->name}}</a>
                            @endif
                        </td>
                        <td>{{ $registration->deposit }}</td>
                        <td>
                            {!!$registration->retreatant->phone_home_mobile_number!!}
                        </td>
                        <td>
                            @if (empty($registration->retreatant->parish_name))
                                N/A
                            @else
                            {!! $registration->retreatant->parish_link!!}
                            @endif
                        </td>
                        <td>{{ $registration->notes }}</td>
                        <td>{!! $registration->registration_status_buttons!!}
                        </td>

                    </tr>
                    @endforeach
            </tbody>
</table>@endif
        </div>
    </div>        </div>

</section>
@stop