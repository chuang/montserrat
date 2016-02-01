@extends('template')
@section('content')
    

<div class="jumbotron text-left">
    <span><h2><strong>Edit Touch point:</strong></h2></span>

    {!! Form::open(['method' => 'PUT', 'route' => ['touchpoint.update', $touchpoint->id]]) !!}
    {!! Form::hidden('id', $touchpoint->id) !!}
    
        <span>
            <h2>Touch point details</h2>
                <div class="form-group">
                    <div class='row'>
                        {!! Form::label('touched_at', 'Date of contact:', ['class' => 'col-md-3'])  !!}
                        {!! Form::text('touched_at', $touchpoint->touched_at, ['class' => 'col-md-3']) !!}
                    </div>
                    <div class='row'>
                        {!! Form::label('person_id', 'Name of Contact:', ['class' => 'col-md-3'])  !!}
                        {!! Form::select('person_id', $persons, $touchpoint->person_id, ['class' => 'col-md-3']) !!}
                    </div>
                    <div class='row'>
                        {!! Form::label('staff_id', 'Contacted by:', ['class' => 'col-md-3'])  !!}
                        {!! Form::select('staff_id', $staff, $touchpoint->staff_id, ['class' => 'col-md-3']) !!}
                    </div>
                    
                    <div class='row'>
                        {!! Form::label('type', 'Type of Contact:', ['class' => 'col-md-3'])  !!}
                        {!! Form::text('type', $touchpoint->type, ['class' => 'col-md-3']) !!}
                    </div>
                    <div class='row'>
                        {!! Form::label('notes', 'Notes:', ['class' => 'col-md-3'])  !!}
                        {!! Form::textarea('notes', $touchpoint->notes, ['class' => 'col-md-3']) !!}                   
                    </div>             
                </div>
            </span>
                

    <div class="form-group">
        {!! Form::image('img/save.png','btnSave',['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop