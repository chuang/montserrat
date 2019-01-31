@extends('template')
@section('content')

<div class="row bg-cover">
    <div class="col-12 text-center">
        {!!$person->avatar_large_link!!}
        <h1>Edit: {{ $person->full_name }}</h1>
    </div>
    <div class="col-12 text-center">
        @if ($person->is_board_member) <span><a href={{ action('PersonController@boardmembers') }}>{!! Html::image('/images/board.png', 'Board Members Group',array('title'=>"Board Members Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_captain) <span><a href={{ action('PersonController@captains') }}>{!! Html::image('/images/captain.png', 'Captains Group',array('title'=>"Captains Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_staff) <span><a href={{ action('PersonController@staff') }}>{!! Html::image('/images/employee.png', 'Staff Group',array('title'=>"Employees Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_steward) <span><a href={{ action('PersonController@stewards') }}>{!! Html::image('/images/steward.png', 'Steward Group',array('title'=>"Stewards Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_volunteer) <span><a href={{ action('PersonController@volunteers') }}>{!! Html::image('/images/volunteer.png', 'Volunteers Group',array('title'=>"Volunteers Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_retreat_director) <span><a href={{ action('PersonController@directors') }}>{!! Html::image('/images/director.png', 'Retreat Directors Group',array('title'=>"Directors Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_retreat_innkeeper) <span><a href={{ action('PersonController@innkeepers') }}>{!! Html::image('/images/innkeeper.png', 'Retreat Innkeepers Group',array('title'=>"Innkeepers Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_retreat_assistant) <span><a href={{ action('PersonController@assistants') }}>{!! Html::image('/images/assistant.png', 'Retreat Assistants Group',array('title'=>"Assistants Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_bishop) <span><a href={{ action('PersonController@bishops') }}>{!! Html::image('/images/bishop.png', 'Bishops Group',array('title'=>"Bishop Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_pastor) <span><a href={{ action('PersonController@pastors') }}>{!! Html::image('/images/pastor.png', 'Pastors Group',array('title'=>"Pastors Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_priest) <span><a href={{ action('PersonController@priests') }}>{!! Html::image('/images/priest.png', 'Priests Group',array('title'=>"Priests Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_deacon) <span><a href={{ action('PersonController@deacons') }}>{!! Html::image('/images/deacon.png', 'Deacons Group',array('title'=>"Deacons Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_provincial) <span><a href={{ action('PersonController@provincials') }}>{!! Html::image('/images/provincial.png', 'Provincials Group',array('title'=>"Provincials Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_superior) <span><a href={{ action('PersonController@superiors') }}>{!! Html::image('/images/superior.png', 'Superiors Group',array('title'=>"Superiors Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf
        @if ($person->is_jesuit) <span><a href={{ action('PersonController@jesuits') }}>{!! Html::image('/images/jesuit.png', 'Jesuits Group',array('title'=>"Jesuits Group",'class' => 'btn btn-outline-dark')) !!}</a></span> @endIf 
    </div>
    <div class="col-12">
        {!! Form::open(['method' => 'PUT', 'files'=>'true', 'route' => ['person.update', $person->id]]) !!}
            {!! Form::hidden('id', $person->id) !!}
            <div class="row text-center">
                <div class="col-12 text-right mt-2">
                    {!! Form::image('/images/save.png','btnSave',['class' => 'btn btn-outline-dark']) !!}
                </div>
            </div>
            <div class="row form-group">
                
            </div>
        {!! Form::close() !!}
    </div>
</div>

<div class="jumbotron text-left">
    <div class="panel panel-default">
        
        <div class='panel-heading'>
            <div class='row' style="height: 175px;">
                    <div class="col-md-12 col-sm-12">
                        
                        <h1 style="position: absolute; top:5px; left:175px; padding: 5px;"><strong></strong></h1>
                    </div>
                </div>
                <span>
                                           
                </span>                
        </div>
    
        <div class='row'>
            <div class='col-md-12'>
                <div class='panel-heading'>
                        
            <h2>Name</h2></div>
                <div class="form-group">
                    {!! Form::label('prefix_id', 'Title:', ['class' => 'col-md-1'])  !!}
                    {!! Form::select('prefix_id', $prefixes, $person->prefix_id, ['class' => 'col-md-2']) !!}
                    <div class="clearfix"> </div>

                    {!! Form::label('first_name', 'First:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('first_name', $person->first_name, ['class' => 'col-md-2']) !!}
                    {!! Form::label('middle_name', 'Middle:', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('middle_name', $person->middle_name, ['class' => 'col-md-2']) !!}
                    {!! Form::label('last_name', 'Last:', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('last_name', $person->last_name, ['class' => 'col-md-2']) !!}
                    <div class="clearfix"> </div>
                    {!! Form::label('suffix_id', 'Suffix:', ['class' => 'col-md-1'])  !!}
                    {!! Form::select('suffix_id', $suffixes, $person->suffix_id, ['class' => 'col-md-2']) !!}

                    {!! Form::label('nick_name', 'Nickname: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('nick_name', $person->nick_name, ['class' => 'col-md-3']) !!}
                    <div class="clearfix"> </div>
                    {!! Form::label('display_name', 'Display name: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('display_name', $person->display_name, ['class' => 'col-md-3']) !!}
                    {!! Form::label('sort_name', 'Sort name: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('sort_name', $person->sort_name, ['class' => 'col-md-3']) !!}
                    <div class="clearfix"> </div>
		    {!! Form::label('agc_household_name', 'AGC Household name: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('agc_household_name', $person->agc_household_name, ['class' => 'col-md-3']) !!}

                    <div class="clearfix"> </div>
                    {!! Form::label('contact_type', 'Contact type: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::select('contact_type', $contact_types, $person->contact_type, ['class' => 'col-md-2']) !!}

                    {!! Form::label('subcontact_type', 'Subcontact type: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::select('subcontact_type', $subcontact_types, $person->subcontact_type, ['class' => 'col-md-2']) !!}
                    <div class="clearfix"> </div>
                    @can('create-avatar')
                        {!! Form::label('avatar', 'Picture (max 5M): ', ['class' => 'col-md-2'])  !!}
                        {!! Form::file('avatar',['class' => 'col-md-2']); !!}
                    @endCan
                    <div class="clearfix"> </div>
                    @can('create-attachment')
                        {!! Form::label('attachment', 'Attachment (max 10M): ', ['class' => 'col-md-2'])  !!}
                        {!! Form::file('attachment',['class' => 'col-md-2']); !!}
                        {!! Form::label('attachment_description', 'Description: (max 200)', ['class' => 'col-md-2'])  !!}
                        {!! Form::text('attachment_description', NULL, ['class' => 'col-md-3']) !!}
                    @endCan
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>  

        <div class='row'>
            <div class='col-md-8'>
                <div class='panel-heading' style="background-color: lightcoral;"><h2>Emergency Contact Information</h2></div>
                <div class="panel-body" style="background-color: lightcoral;">
                    {!! Form::label('emergency_contact_name', 'Name: ', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('emergency_contact_name', $person->emergency_contact_name, ['class' => 'col-md-2']) !!}
                    
                    {!! Form::label('emergency_contact_relationship', 'Relationship: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('emergency_contact_relationship', $person->emergency_contact_relationship, ['class' => 'col-md-2']) !!}
                </div>
                <div class="clearfix"> </div>
                <div class="panel-body" style="background-color: lightcoral;">
                    {!! Form::label('emergency_contact_phone', 'Phone: ', ['class' => 'col-md-1'])  !!}
                    {!! Form::text('emergency_contact_phone', $person->emergency_contact_phone, ['class' => 'col-md-2']) !!}

                    {!! Form::label('emergency_contact_phone_alternate', 'Alt. Phone: ', ['class' => 'col-md-2'])  !!}
                    {!! Form::text('emergency_contact_phone_alternate', $person->emergency_contact_phone_alternate, ['class' => 'col-md-2']) !!}
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>

        <div class='row'>
            <div class='col-md-8'>
            @include('persons.update.addresses')
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
                <div class='panel-heading'><h2>Demographics</h2></div>
                    <div class="form-group">
                        {!! Form::label('gender_id', 'Gender:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('gender_id', $genders, $person->gender_id, ['class' => 'col-md-2']) !!}
                        <div class="clearfix"> </div>
                        {!! Form::label('birth_date', 'Birth Date:', ['class' => 'col-md-2']) !!}
                        {!! Form::text('birth_date', $person->birth_date, ['class'=>'col-md-2 flatpickr-date']) !!}
                        <div class="clearfix"> </div>


                    </div>
                    <div class="form-group">
                        {!! Form::label('religion_id', 'Religion:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('religion_id', $religions, $person->religion_id, ['class' => 'col-md-2']) !!} 
                        <div class="clearfix"> </div>
                        {!! Form::label('occupation_id', 'Occupation:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('occupation_id', $occupations, $person->occupation_id, ['class' => 'col-md-3']) !!} 
                        <div class="clearfix"> </div>

                        {!! Form::label('parish_id', 'Parish:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('parish_id', $parish_list, $person->parish_id, ['class' => 'col-md-8']) !!} 
                        <div class="clearfix"> </div>
                    </div>
                    <div class="form-group">                        
                        {!! Form::label('ethnicity_id', 'Ethnicity:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('ethnicity_id', $ethnicities, $person->ethnicity_id, ['class' => 'col-md-2']) !!}
                        <div class="clearfix"> </div>
                        {!! Form::label('languages', 'Languages:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('languages[]', $languages, $person->languages->pluck('id')->toArray(), ['id'=>'languages','class' => 'form-control col-md-2','multiple' => 'multiple','style'=>'width: auto; font-size: inherit;']) !!}
                        <div class="clearfix"> </div>
                       
                        {!! Form::label('preferred_language_id', 'Preferred Language:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('preferred_language_id', $languages, $person->preferred_language_id, ['class' => 'col-md-3']) !!}
                        <div class="clearfix"> </div>
                        {!! Form::label('referrals', 'Referral sources:', ['class' => 'col-md-2'])  !!}
                        {!! Form::select('referrals[]', $referrals, $person->referrals->pluck('id')->toArray(), ['id'=>'referrals','class' => 'form-control col-md-2','multiple' => 'multiple','style'=>'width: auto; font-size: inherit;']) !!}
                        
                    </div>
                <div class="clearfix"> </div>
                    <div class="form-group">                        
                        {!! Form::label('deceased_date', 'Deceased Date:', ['class' => 'col-md-2'])  !!}
                        {!! Form::text('deceased_date', $person->deceased_date, ['class'=>'col-md-2 flatpickr-date']) !!}
                        {!! Form::label('is_deceased', 'Is Deceased:', ['class' => 'col-md-2'])  !!}
                        {!! Form::checkbox('is_deceased', 1, $person->is_deceased, ['class' => 'col-md-1']) !!}
                        <div class="clearfix"> </div>
                    </div>
            </div>
            <div class="clearfix"> </div>

        </div>
        <div class="clearfix"> </div>

        <div class='row'>
            <div class='col-md-8'>
                <div class='panel-heading'><h2>Health Notes</h2></div>
                    <div class="form-group">
                        {!! Form::label('note_health', 'Health Notes:', ['class' => 'col-md-2'])  !!}
                        {!! Form::textarea('note_health', $person->note_health, ['class' => 'col-md-3','size'=>'50x5']) !!}
                        {!! Form::label('note_dietary', 'Dietary Notes:', ['class' => 'col-md-2'])  !!}
                        {!! Form::textarea('note_dietary', $person->note_dietary, ['class' => 'col-md-3','size'=>'50x5']) !!}
                    </div>
                </div>
        </div>
        <div class="clearfix"> </div>


        <div class='row'>
            <div class='col-md-8'>
                <span>
                    <div class='panel-heading'><h2>General Notes</h2></div>
                    <div class="form-group">
                        {!! Form::label('note_contact', 'General Notes:', ['class' => 'col-md-2'])  !!}
                        {!! Form::textarea('note_contact', $person->note_contact, ['class' => 'col-md-3','size'=>'50x5']) !!}
                        {!! Form::label('note_room_preference', 'Room Preference:', ['class' => 'col-md-2'])  !!}
                        {!! Form::textarea('note_room_preference', $person->note_room_preference, ['class' => 'col-md-3','size'=>'50x5']) !!}
                    </div>
                </span>
            </div>
        </div>
        <div class="clearfix"> </div>

        <div class='row'>
                <div class='col-md-8'>
                    <div class='panel-heading'><h2>Groups and Relationships</h2></div>
                        <div class="form-group">
                            {!! Form::label('is_donor', 'Donor:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_donor', 1, $person->is_donor, ['class' => 'col-md-1']) !!}
                            {!! Form::label('is_steward', 'Steward:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_steward', 1, $person->is_steward, ['class' => 'col-md-1']) !!}
                            {!! Form::label('is_volunteer', 'Volunteer:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_volunteer', 1, $person->is_volunteer,['class' => 'col-md-1']) !!}
                        </div><div class="clearfix"> </div>
                        <div class="form-group">
                            {!! Form::label('is_retreatant', 'Retreatant:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_retreatant', 1, $person->is_retreatant,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_captain', 'Captain:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_captain', 1, $person->is_captain,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_hlm2017', 'HLM 2017:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_hlm2017', 1, $person->is_hlm2017,['class' => 'col-md-1']) !!}
                        </div><div class="clearfix"> </div>

                        <div class="form-group">
                            {!! Form::label('is_bishop', 'Bishop:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_bishop', 1, $person->is_bishop,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_priest', 'Priest:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_priest', 1, $person->is_priest,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_deacon', 'Deacon:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_deacon', 1, $person->is_deacon,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_pastor', 'Pastor:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_pastor', 1, $person->is_pastor,['class' => 'col-md-1']) !!}
                        </div><div class="clearfix"> </div>

                        <div class="form-group">
                            {!! Form::label('is_jesuit', 'Jesuit:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_jesuit', 1, $person->is_jesuit,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_provincial', 'Provincial:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_provincial', 1, $person->is_provincial,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_superior', 'Superior:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_superior', 1, $person->is_superior,['class' => 'col-md-1']) !!}
                        </div><div class="clearfix"> </div>

                        <div class="form-group">
                            {!! Form::label('is_board', 'Board Member:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_board', 1, $person->is_board_member,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_formerboard', 'Former Board:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_formerboard', 1, $person->is_former_board_member,['class' => 'col-md-1','disabled']) !!}
                        </div><div class="clearfix"> </div>

                        <div class="form-group">
                            {!! Form::label('is_staff', 'Staff:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_staff', 1, $person->is_staff,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_director', 'Retreat Director:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_director', 1, $person->is_retreat_director,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_innkeeper', 'Retreat Innkeeper:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_innkeeper', 1, $person->is_retreat_innkeeper,['class' => 'col-md-1']) !!}
                            {!! Form::label('is_assistant', 'Retreat Assistant:', ['class' => 'col-md-2'])  !!}
                            {!! Form::checkbox('is_assistant', 1, $person->is_retreat_assistant,['class' => 'col-md-1']) !!}
                        </div><div class="clearfix"> </div>

                </div>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="form-group">
        {!! Form::image('/images/save.png','btnSave',['class' => 'btn btn-outline-dark']) !!}
    </div>
   
</div>
@stop
