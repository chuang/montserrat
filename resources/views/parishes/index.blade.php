@extends('template')
@section('content')



    <section class="section-padding">
        <div class="jumbotron text-left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>
                        <span class="grey">Parish Index</span> 
                        <span class="create"><a href={{ action('ParishesController@create') }}>{!! Html::image('img/create.png', 'Create a Parish',array('title'=>"Create Parish",'class' => 'btn btn-primary')) !!}</a></span></h1>
                        <span class="btn btn-primary"><a href={{ action('ParishesController@dallasdiocese') }}>Diocese of Dallas</a></span>
                        <span class="btn btn-primary"><a href={{ action('ParishesController@fortworthdiocese') }}>Diocese of Fort Worth</a></span>
                        <span class="btn btn-primary"><a href={{ action('ParishesController@tylerdiocese') }}>Diocese of Tyler</a></span>
                    </h1>
             
                </div>
                @if ($parishes->isEmpty())
                    <p>No parishes are currently in the database.</p>
                @else
                <table class="table table-bordered table-striped table-hover"><caption><h2>Parishes</h2></caption>
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
                                <a href="person/{{$parish->pastor->contact_b->id}}">{{ $parish->pastor->contact_b->display_name}}</a>
                                @endif
                            </td>
                            <td>
                                @foreach($parish->addresses as $address)
                                @if ($address->is_primary)
                                    {!!$address->google_map!!} 
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