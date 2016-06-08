@extends('template')
@section('content')
    

<div class="jumbotron text-left">
    <span><h2><strong>Edit Person: 
        {{ isset($person->title) ? $person->title : null }} 
        {{ isset($person->firstname) ? $person->firstname : null }} 
        {{ isset($person->middlename) ? $person->middlename : null}} 
        {{ $person->lastname}}{{isset($person->suffix) ? ', '.$person->suffix : null }}
        {{ (!empty($person->nickname)) ? "(&quot;$person->nickname&quot;)" : null }}
    </strong></h2></span>

    <span class="back">
        @if ($person->is_assistant) <span class="back"><a href={{ action('PersonsController@assistants') }}>{!! Html::image('img/assistant.png', 'Assistants Index',array('title'=>"Assistants Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_bishop) <span class="back"><a href={{ action('PersonsController@bishops') }}>{!! Html::image('img/bishop.png', 'Bishop Index',array('title'=>"Bishop Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_board) <span class="back"><a href={{ action('PersonsController@boardmembers') }}>{!! Html::image('img/board.png', 'Board Members Index',array('title'=>"Board Members Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_captain) <span class="back"><a href={{ action('PersonsController@captains') }}>{!! Html::image('img/captain.png', 'Captains Index',array('title'=>"Captains Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_catholic) <span class="back"><a href={{ action('PersonsController@catholics') }}>{!! Html::image('img/catholic.png', 'Catholics Index',array('title'=>"Catholics Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_director) <span class="back"><a href={{ action('PersonsController@directors') }}>{!! Html::image('img/director.png', 'Directors Index',array('title'=>"Directors Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_donor) <span class="back"><a href={{ action('PersonsController@donors') }}>{!! Html::image('img/donor.png', 'Donor Index',array('title'=>"Donor Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_innkeeper) <span class="back"><a href={{ action('PersonsController@innkeepers') }}>{!! Html::image('img/innkeeper.png', 'Innkeepers Index',array('title'=>"Innkeepers Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_pastor) <span class="back"><a href={{ action('PersonsController@pastors') }}>{!! Html::image('img/pastor.png', 'Pastors Index',array('title'=>"Pastors Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_retreatant) <span class="back"><a href={{ action('PersonsController@retreatants') }}>{!! Html::image('img/retreatant.png', 'Retreatants Index',array('title'=>"Retreatants Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_staff) <span class="back"><a href={{ action('PersonsController@employees') }}>{!! Html::image('img/employee.png', 'Employees Index',array('title'=>"Employees Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
        @if ($person->is_volunteer) <span class="back"><a href={{ action('PersonsController@volunteers') }}>{!! Html::image('img/volunteer.png', 'Volunteers Index',array('title'=>"Volunteers Index",'class' => 'btn btn-primary')) !!}</a></span> @endIf
    </span>                

    
    {!! Form::open(['method' => 'PUT', 'route' => ['person.update', $person->id]]) !!}
    {!! Form::hidden('id', $person->id) !!}
    
    <div class='row'>
        <div class='col-md-8'>
            <span>
            <h2>Name</h2>
                <div class="form-group">
                    {!! Form::label('title', 'Title:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('title', $person->title, ['class' => 'col-md-2']) !!}
                    {!! Form::label('first_name', 'First:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('first_name', $person->first_name, ['class' => 'col-md-2']) !!}
                    {!! Form::label('middle_name', 'Middle:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('middle_name', $person->middle_name, ['class' => 'col-md-2']) !!}
                    {!! Form::label('last_name', 'Last:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('last_name', $person->last_name, ['class' => 'col-md-2']) !!}
                <div class="clearfix"> </div>
                    {!! Form::label('suffix', 'Suffix:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('suffix', $person->suffix, ['class' => 'col-md-1']) !!}
                    {!! Form::label('nick_name', 'Nickname: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('nick_name', $person->nick_name, ['class' => 'col-md-2']) !!}
                    {!! Form::label('display_name', 'Display name: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('display_name', $person->display_name, ['class' => 'col-md-2']) !!}
                    {!! Form::label('sort_name', 'Sort name: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('sort_name', $person->sort_name, ['class' => 'col-md-2']) !!}

                    
                </div>
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>  

    <div class='row'>
        <div class='col-md-8'>
            <span>
            <h2>Emergency Contact Information</h2>
                <div class="form-group">
                    {!! Form::label('emergencycontactname', 'Name:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('emergencycontactname', $person->emergencycontactname, ['class' => 'col-md-2']) !!}
                    {!! Form::label('emergencycontactphone', 'Phone:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('emergencycontactphone', $person->emergencycontactphone, ['class' => 'col-md-2']) !!}
                    {!! Form::label('emergencycontactphone2', 'Alternate Phone:', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('emergencycontactphone2', $person->emergencycontactphone2, ['class' => 'col-md-2']) !!}
                </div>
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>

    <div class='row'>
        <div class='col-md-8'>
            <span>
  @include('persons.update.addresses')
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>

    <div class='row'>
        <div class='col-md-8'>
            <span>
                @include('persons.update.phones')
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>
    <div class='row'>
        <div class='col-md-8'>
            <span>
            @include('persons.update.emails')
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>
    <div class='row'>
        <div class='col-md-8'>
            <span>
            @include('persons.update.urls')
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>


    <div class='row'>
        <div class='col-md-8'>
            <span>
            <h2>Demographics</h2>
                <div class="form-group">
                    {!! Form::label('gender', 'Gender:', ['class' => 'col-md-1'])  !!}
                    @if (!empty($person->gender)) 
                    {!! Form::select('gender', [
                            'Female' => 'Female',
                            'Male' => 'Male',
                            'Other' => 'Other',
                            'Unspecified' => 'Unspecified',
                            ], $person->gender, ['class' => 'col-md-2']) !!}
                    @else {!! Form::select('gender', [
                            'Female' => 'Female',
                            'Male' => 'Male',
                            'Other' => 'Other',
                            'Unspecified' => 'Unspecified',
                            ], 'Unspecified', ['class' => 'col-md-2']) !!}
                    @endIf  
                    {!! Form::label('dob', 'DOB:', ['class' => 'col-md-1']) !!}
                    {!! Form::text('dob', null, ['class'=>'col-md-2','data-provide'=>'datepicker']) !!}
                </div>
                <div class="clearfix"> </div>

                <div class="form-group">
                    {!! Form::label('parish_id', 'Parish:', ['class' => 'col-md-1'])  !!}
                    {!! Form::select('parish_id', $parishes, $person->parish_id, ['class' => 'col-md-8']) !!} 
                    
                </div>
                    <div class="clearfix"> </div>

                <div class="form-group">
                    {!! Form::label('ethnicity', 'Ethnicity:', ['class' => 'col-md-1'])  !!}
                    @if (!empty($person->ethnicity))
                        {!! Form::select('ethnicity', $ethnicities, $person->ethnicity, ['class' => 'col-md-3']) !!}
                    @else
                        {!! Form::select('ethnicity', $ethnicities, 'Unspecified', ['class' => 'col-md-3']) !!}
                    @endIf    
                    {!! Form::label('languages', 'Languages:', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('languages', $person->languages, ['class' => 'col-md-3']) !!}
                </div>
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>


    <div class='row'>
        <div class='col-md-8'>
            <span>
            <h2>Health Notes</h2>
                <div class="form-group">
                    {!! Form::label('medical', 'Medical Notes:', ['class' => 'col-md-2'])  !!}
                    {!! Form::textarea('medical', $person->medical, ['class' => 'col-md-3']) !!}
                    {!! Form::label('dietary', 'Dietary Notes:', ['class' => 'col-md-2'])  !!}
                    {!! Form::textarea('dietary', $person->dietary, ['class' => 'col-md-3']) !!}
                </div>
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>


    <div class='row'>
        <div class='col-md-8'>
            <span>
            <h2>General Notes</h2>
                <div class="form-group">
                    {!! Form::label('notes', 'General Notes:', ['class' => 'col-md-2'])  !!}
                    {!! Form::textarea('notes', $person->notes, ['class' => 'col-md-3']) !!}
                    {!! Form::label('roompreference', 'Room Preference:', ['class' => 'col-md-2'])  !!}
                    {!! Form::textarea('roompreference', $person->roompreference, ['class' => 'col-md-3']) !!}
                </div>
            </span>
        </div>
    </div>
    <div class="clearfix"> </div>

 <div class='row'>
            <div class='col-md-8'>
                <span>
                    <h2>Roles</h2>
                    <div class="form-group">
                        {!! Form::label('is_donor', 'Donor:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_donor', 1, $person->is_donor, ['class' => 'col-md-1']) !!}
                        {!! Form::label('is_retreatant', 'Retreatant:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_retreatant', 1, $person->is_retreatant,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_catholic', 'Catholic:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_catholic', 1, $person->is_catholic,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_deceased', 'Deceased:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_deceased', 1, $person->is_deceased,['class' => 'col-md-1']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_director', 'Retreat Director:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_director', 1, $person->is_director,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_innkeeper', 'Retreat Innkeeper:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_innkeeper', 1, $person->is_innkeeper,['class' => 'col-md-1']) !!}
                         {!! Form::label('is_assistant', 'Retreat Assistant:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_assistant', 1, $person->is_assistant,['class' => 'col-md-1']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_captain', 'Captain:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_captain', 1, $person->is_captain,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_volunteer', 'Volunteer:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_volunteer', 1, $person->is_volunteer,['class' => 'col-md-1']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_staff', 'Staff:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_staff', 1, $person->is_staff,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_board', 'Board Member:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_board', 1, $person->is_board,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_formerboard', 'Former Board:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_formerboard', 1, $person->is_formerboard,['class' => 'col-md-1']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_jesuit', 'Jesuit:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_jesuit', 1, $person->is_jesuit,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_pastor', 'Pastor of Parish:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_pastor', 1, $person->is_pastor,['class' => 'col-md-1']) !!}
                        {!! Form::label('is_bishop', 'Bishop:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_bishop', 1, $person->is_bishop,['class' => 'col-md-1']) !!}
                    </div>    
                </span>
            </div>
        </div><div class="clearfix"> </div>
       
    </section>

    <div class="form-group">
        {!! Form::image('img/save.png','btnSave',['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop