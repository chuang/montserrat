@extends('template')
@section('content')

<section class="section-padding">
    <div class="jumbotron text-left">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span><h2>Group details</h2></span>  
                <span class="btn btn-default">
                            <a href={{ action('TouchpointsController@add_group',$group->id) }}>Add Group Touchpoint</a>
                        </span>
                        
            </div>
            
            <div class='row'>
                <div class='col-md-4'>
                        <strong>Name: </strong>{{$group->name}}
                        <br /><strong>Title: </strong>{{$group->title}}  
                        <br /><strong>Description: </strong>{{$group->description}}     
                        <br /><strong>Active: </strong>{{$group->is_active}}
                        <br /><strong>Hidden: </strong>{{$group->is_hidden}}
                        <br /><strong>Reserved: </strong>{{$group->is_reserved}}
                    
                </div>
            </div>
            
             <div class='col-md-4'>
                    <span><h2><strong>Members of the {{$group->name}} Group</strong></h2>
                        <div class="scroll">
                            @foreach($members as $member)
                                <a href="../person/{{$member->id}}">{{$member->sort_name}}</a><br />
                            @endforeach
                        </div>
                    </span>
                </div>
            </div><div class="clearfix"> </div>

        </div>
            <div class='row'>
                <div class='col-md-1'><a href="{{ action('GroupsController@edit', $group->id) }}" class="btn btn-info">{!! Html::image('img/edit.png', 'Edit',array('title'=>"Edit")) !!}</a></div>
                <div class='col-md-1'>{!! Form::open(['method' => 'DELETE', 'route' => ['group.destroy', $group->id],'onsubmit'=>'return ConfirmDelete()']) !!}
                {!! Form::image('img/delete.png','btnDelete',['class' => 'btn btn-danger','title'=>'Delete']) !!} 
                {!! Form::close() !!}</div><div class="clearfix"> </div>
            </div>
        
    </div>
</section>
@stop