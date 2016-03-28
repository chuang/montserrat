@extends('template')
@section('content')



    <section class="section-padding">
        <div class="jumbotron text-left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>
                    <span class="grey">Diocese of Dallas Parish Index</span> 
                    <span class="create"><a href={{ action('ParishesController@create') }}>{!! Html::image('img/create.png', 'Create a Parish',array('title'=>"Create Parish",'class' => 'btn btn-primary')) !!}</a></span></h1>
                </div>
                @if ($parishes->isEmpty())
                    <p>No Diocese of Dallas parishes are currently in the database.</p>
                @else
                <table class="table"><caption><h2>Diocese of Dallas Parishes</h2></caption>
                    <thead>
                        <tr>
                            <th>Name</th> 
                            <th>Diocese</th>
                            <th>Pastor</th> 
                            <th>Address</th> 
                            <th>Phone</th> 
                            <th>Email</th> 
                            <th>Webpage</th> 
                       </tr>
                    </thead>
                    <tbody>
                   @foreach($parishes as $parish)
                        <tr>
                            <td><a href="parish/{{$parish->id}}">{{ $parish->organization_name }} </a></td>
                            <td><a href="diocese/{{$parish->diocese->contact_id_a}}">{{ $parish->diocese->contact_a->organization_name }}</a></td> 
                            <td>
                                @if (empty($parish->pastor->contact_b))
                                No pastor assigned
                                @else
                                <a href="contact/{{$parish->pastor->contact_b->id}}">{{ $parish->pastor->contact_b->display_name}}</a>
                                @endif
                            </td>
                            <td>
                                @foreach($parish->addresses as $address)
                                @if ($address->is_primary)
                                <a href="http://maps.google.com/?q={{$address->street_address}} {{ $address->suplemental_address_1}} {{ $address->city}} {{ $address->state->abbreviation}} {{ $address->postal_code}}" target="_blank">
                                {{ $address->street_address }} ({{ $address->city }})
                                </a>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($parish->phones as $phone)
                                @if (($phone->location_type_id==3) and ($phone->phone_type=="Phone"))  
                                <a href="tel:{{ $phone->phone }}"> {{ $phone->phone }}</a>
                                @endif
                                @endforeach
                            </td>
                            <td> 
                                @foreach($parish->emails as $email)
                                @if ($email->is_primary)  
                                <a href="mailto:{{ $email->email }}">{{ $email->email }}</a> 
                                @endif
                                @endforeach
                            </td>
                            <td>
                                
                                @foreach($parish->websites as $website)
                                 @if(!empty($website->url))
                                <a href="{{$website->url}}" target="_blank">{{$website->url}}</a><br />
                                @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        @endforeach
                       </tbody>
                </table>
                @endif
            </div>
        </div>
    </section>
@stop