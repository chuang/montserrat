@extends('template')
@section('content')

    <section class="section-padding">
        <div class="jumbotron text-left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>
                    <span class="grey">Person Index</span> 
                    <span class="create"><a href={{ action('PersonsController@create') }}>{!! Html::image('img/create.png', 'Add Person',array('title'=>"Add Person",'class' => 'btn btn-link')) !!}</a></span></h1>
                    <span class="boards"><a href={{ action('PersonsController@boardmembers') }}>{!! Html::image('img/board.png', 'Board members',array('title'=>"Board members",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="captains"><a href={{ action('PersonsController@captains') }}>{!! Html::image('img/captain.png', 'Captains',array('title'=>"Captains",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="employees"><a href={{ action('PersonsController@employees') }}>{!! Html::image('img/employee.png', 'Employees',array('title'=>"Employees",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="volunteers"><a href={{ action('PersonsController@volunteers') }}>{!! Html::image('img/volunteer.png', 'Volunteers',array('title'=>"Volunteers",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="directors"><a href={{ action('PersonsController@directors') }}>{!! Html::image('img/director.png', 'Directors',array('title'=>"Directors",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="innkeepers"><a href={{ action('PersonsController@innkeepers') }}>{!! Html::image('img/innkeeper.png', 'Innkeepers',array('title'=>"Innkeepers",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="assistants"><a href={{ action('PersonsController@assistants') }}>{!! Html::image('img/assistant.png', 'Assistants',array('title'=>"Assistants",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="bishops"><a href={{ action('PersonsController@bishops') }}>{!! Html::image('img/bishop.png', 'Bishops',array('title'=>"Bishops",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="pastors"><a href={{ action('PersonsController@pastors') }}>{!! Html::image('img/pastor.png', 'Pastors',array('title'=>"Pastors",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="priests"><a href={{ action('PersonsController@priests') }}>{!! Html::image('img/priest.png', 'Priests',array('title'=>"Priests",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="deacons"><a href={{ action('PersonsController@deacons') }}>{!! Html::image('img/deacon.png', 'Deacons',array('title'=>"Deacons",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="provincials"><a href={{ action('PersonsController@provincials') }}>{!! Html::image('img/provincial.png', 'Provincials',array('title'=>"Provincials",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="superiors"><a href={{ action('PersonsController@superiors') }}>{!! Html::image('img/superior.png', 'Superiors',array('title'=>"Superiors",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <span class="jesuits"><a href={{ action('PersonsController@jesuits') }}>{!! Html::image('img/jesuit.png', 'Jesuits',array('title'=>"Jesuits",'class' => 'btn btn-info')) !!}</a></span></h1>
                    <!-- <span class="donors"><a href={{ action('PersonsController@donors') }}>{!! Html::image('img/donor.png', 'Donors',array('title'=>"Donors",'class' => 'btn btn-info')) !!}</a></span></h1> -->
                    <!-- <span class="retreatants"><a href={{ action('PersonsController@retreatants') }}>{!! Html::image('img/retreatant.png', 'Retreatants',array('title'=>"Retreatants",'class' => 'btn btn-info')) !!}</a></span></h1> -->
                
                </div>
                
                @if ($persons->isEmpty())
                    <p>It is a brand new world, there are no persons!</p>
                @else
                <table class="table table-striped table-bordered table-hover"><caption><h2>Persons</h2></caption>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address (City)</th>
                            <th>Home phone</th>
                            <th>Cell phone</th>
                            <th>Email</th>
                            <th>Parish (City)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($persons as $person)
                        <tr>
                            <td><a href="person/{{ $person->id}}">{{$person->full_name}}</a></td>
                            <td>
                                @if($person->do_not_mail)
                                    <div class="alert alert-warning"><strong>Do Not Mail</strong></div>
                                @endIf
                                @foreach($person->addresses as $address)
                                    @if ($address->is_primary)
                                        {!!$address->google_map!!}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if($person->do_not_phone)
                                    <div class="alert alert-warning"><strong>Do Not Call</strong></div>
                                @endIf
                                @if($person->do_not_sms)
                                    <div class="alert alert-warning"><strong>Do Not Text</strong></div>
                                @endIf
                                @foreach($person->phones as $phone)
                                @if (($phone->location_type_id==1) and ($phone->phone_type=="Phone"))  
                                <a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a> 
                                @endif
                                @endforeach
                                
                            <td>
                                
                                @if($person->do_not_phone)
                                    <div class="alert alert-warning"><strong>Do Not Call</strong></div>
                                @endIf
                                @if($person->do_not_sms)
                                    <div class="alert alert-warning"><strong>Do Not Text</strong></div>
                                @endIf
                                @foreach($person->phones as $phone)
                                @if (($phone->location_type_id==1) and ($phone->phone_type=="Mobile"))  
                                <a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a> 
                                @endif
                                @endforeach
                            </td>
                            <td>
                                
                                @if($person->do_not_email)
                                    <div class="alert alert-warning"><strong>Do Not Email</strong></div>
                                @endIf
                                @foreach($person->emails as $email)
                                @if ($email->is_primary)  
                                <a href="mailto:{{ $email->email }}">{{ $email->email }}</a> 
                                @endif
                                @endforeach
                            </td>
                            <td>
                                {!! $person->parish_link !!}
                            </td>
                        </tr>
                        @endforeach
                    {!! $persons->render() !!}    
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </section>
@stop