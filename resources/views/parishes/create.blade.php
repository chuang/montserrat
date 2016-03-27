@extends('template')
@section('content')

    <section class="section-padding">
        <div class="jumbotron text-left">
            <h2><strong>Add A Parish</strong></h2>
            {!! Form::open(['url' => 'parish', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
           <div class="form-group">

                {!! Form::label('diocese_id', 'Diocese:', ['class' => 'col-md-1']) !!}
                {!! Form::select('diocese_id', $dioceses, 0, ['class' => 'col-md-2']) !!}
                
            </div><div class="clearfix"> </div>
           <div class="form-group">

                {!! Form::label('pastor_id', 'Pastor:', ['class' => 'col-md-1']) !!}
                {!! Form::select('pastor_id', $pastors, 0, ['class' => 'col-md-2']) !!}
               
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('organization_name', 'Name:', ['class' => 'col-md-1']) !!}
                {!! Form::text('organization_name', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('street_address', 'Address:', ['class' => 'col-md-1']) !!}
                {!! Form::text('street_address', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('supplemental_address_1', 'Address2:', ['class' => 'col-md-1']) !!}
                {!! Form::text('supplemental_address_1', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('city', 'City:', ['class' => 'col-md-1']) !!}
                {!! Form::text('city', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('state_province_id', 'State:', ['class' => 'col-md-1'])  !!}
                {!! Form::select('state_province_id', $states, $default['state_province_id'], ['class' => 'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('postal_code', 'Zip:', ['class' => 'col-md-1']) !!}
                {!! Form::text('postal_code', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('country_id', 'Country:', ['class' => 'col-md-1'])  !!}
                {!! Form::select('country_id', $countries, $default['country_id'], ['class' => 'col-md-1']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('phone_main_phone', 'Phone:', ['class' => 'col-md-1']) !!}
                {!! Form::text('phone_main_phone', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('phone_main_fax', 'Fax:', ['class' => 'col-md-1']) !!}
                {!! Form::text('phone_main_fax', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('email_main', 'Email:', ['class' => 'col-md-1']) !!}
                {!! Form::text('email_main', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('website_main', 'Webpage:', ['class' => 'col-md-1']) !!}
                {!! Form::text('website_main', null, ['class'=>'col-md-2']) !!}
            </div><div class="clearfix"> </div>
            <div class="form-group">
                {!! Form::label('note', 'Note:', ['class' => 'col-md-1']) !!}
                {!! Form::textarea('note', null, ['class'=>'col-md-5', 'rows'=>'3']) !!}
            </div><div class="clearfix"> </div>
            <div class="col-md-1"><div class="form-group">
                {!! Form::submit('Add Parish', ['class'=>'btn btn-primary']) !!}
            </div></div>
                {!! Form::close() !!}
        </div>
    </section>

@stop