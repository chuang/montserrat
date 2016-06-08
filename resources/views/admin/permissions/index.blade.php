@extends('template')
@section('content')

    <section class="section-padding">
        <div class="jumbotron text-left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>
                    <span class="grey">Permissions Index</span> 
                    <span class="create"><a href={{ action('PermissionsController@create') }}>{!! Html::image('img/create.png', 'Add Touchpoint',array('title'=>"Add Touchpoint",'class' => 'btn btn-primary')) !!}</a></span></h1>
                
                </div>
                @if ($permissions->isEmpty())
                    <p>It is a brand new world, there are no permissions!</p>
                @else
                <table class="table"><caption><h2>Permissions</h2></caption>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Display name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td><a href="permission/{{ $permission->id}}">{{ $permission->name }}</a></td>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->description }}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </section>
@stop