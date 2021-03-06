<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <title>Montserrat Retreat House Database</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/all.css')}}"> 
        
        <script>

            function ConfirmDelete() {
                var x = confirm("Are you sure you want to delete?");
                if (x)
                    return true;
                else
                return false;
            }

        </script>
    </head>
    
    <body>
    <header>
        <nav class="navbar navbar-default" style="background: #b7a99a;">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">
                @if (isset(Auth::user()->name))
                   <a href={{ route('welcome') }}>{!! Html::image('img/mrhlogoblack.png','Home',array('title'=>'Home','class'=>'logo')) !!}</a>
                @else
                   <a href={{ route('home') }}>{!! Html::image('img/mrhlogoblack.png','Home',array('title'=>'Home','class'=>'logo')) !!}</a>
                @endif
              </a>
            </div>
            <div class="navbar-right">
                @if (isset(Auth::user()->avatar))
                    {!! Html::image(Auth::user()->avatar, Auth::user()->name,array('title'=>Auth::user()->name, 'width'=>75, 'height'=>75, 'class' => "img-circle")) !!}
                    <a href={{ route('logout') }}>{!! Html::image('img/logout.png', 'Logout',array('title'=>"Logout")) !!}</a>
                @else
                    <a href="login/google">{!! Html::image('img/login.png', 'Login',array('title'=>"Login")) !!}</a>
                @endif
             <br />
            
            </div>
          </div>
        </nav>
        @can('show-contact')
            <div class="row">
                <div class="col-md-6">
                {{ Form::open(['action' => ['SearchController@getuser'], 'method' => 'GET']) }}
                {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Find contact by name','class'=>'col-md-6'])}}
                {{ Form::hidden('response', '', array('id' =>'response')) }}
                {{ Form::submit('Find Person', array('class' => 'btn btn-default','id'=>'btnSearch','style'=>'display:none')) }}
                <a href="{{action('SearchController@search')}}">{!! Html::image('img/search.png', 'Advanced search',array('title'=>"Advanced search",'class' => 'btn btn-link')) !!}</a>
                {{ Form::close() }}
                </div>
            </div>
        @endCan
        <div class="clearfix"> </div>
        <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                @can('show-retreat')
                    <li>
                        <a href={{ route('retreat.index') }}>Retreats</a>
                    </li>
                @endCan
                <!-- <li><a href={{ route('registration.index') }}>Registrations</a></li> -->
                <!-- <li><a href={{ route('reservation') }}> {!! Html::image('img/reservation.png', 'Reservation',array('title'=>"Reservation")) !!}</a></li> -->
                @can('show-room')
                    <li>
                        <a href={{ route('rooms') }}>Rooms</a>
                    </li>
                @endCan
                @can('show-contact')
                    <li>
                        <a href={{ route('person.index') }}>Persons</a>
                    </li>
                    <li>
                        <a href={{ route('parish.index') }}>Parishes</a>
                    </li>
                    <li>
                        <a href={{ route('diocese.index') }}>Dioceses</a>
                    </li>
                    <li>
                        <a href={{ route('organization.index') }}>Organizations</a></li>
                    <li>
                        <a href={{ route('vendor.index') }}>Vendors</a>
                    </li>
                @endCan    
                @can('show-touchpoint')
                    <li>
                        <a href={{ route('touchpoint.index') }}>Touchpoints</a>
                    </li>
                @endCan
                @can('show-admin-menu')
                    <li>
                        <a href={{ route('role.index') }}>Roles</a>
                    </li>
                    <li>
                        <a href={{ route('permission.index') }}>Permissions</a>
                    </li>
                @endCan
                @can('show-donation')
                    <li>
                        <a href={{ route('finance') }}>Finance</a>
                    </li>
                @endCan 
            </ul>
        </div>
        </nav>
        <div>
        @can('show-gate')
            <a href={{ route('gate.open') }} class="btn btn-success">Open gate</a>
            <a href={{ route('gate.close') }} class="btn btn-danger">Close gate</a>
            <div class="dropdown" style="display: inline">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Open gate for...
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href={{ route('gate.open', ['hours' => 1]) }}>1 hour</a></li>
                    <li><a href={{ route('gate.open', ['hours' => 2]) }}>2 hours</a></li>
                    <li><a href={{ route('gate.open', ['hours' => 3]) }}>3 hours</a></li>
                    <li><a href={{ route('gate.open', ['hours' => 4]) }}>4 hours</a></li>
                    <li><a href={{ route('gate.open', ['hours' => 5]) }}>5 hours</a></li>
                </ul>
            </div>
        @endcan
        </div>
    </header>
        
    @if (isset($errors) && count($errors) > 0)
    
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @yield('content')
    <hr />
    <div class='footer'>
        <p>
            <a href='https://goo.gl/QmEUut' target='_blank'>
                600 N Shady Shores Drive<br />
                Lake Dallas, TX 75065<br />
            </a>
            (940) 321-6020<br /> 
            <a href='http://montserratretreat.org/' target='_blank'>montserratretreat.org</a>
        </p>
    </div>
  
  <script type="text/javascript" src="{{asset('js/all.js')}}"></script> 
        
  <script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!};
    $(function() {
    
    $( "#start_date" ).datetimeEntry({
        datetimeFormat:'N d, Y h:M a'});
    $( "#end_date" ).datetimeEntry({
        datetimeFormat:'N d, Y h:M a'});
    $( "#donation_date" ).datepicker();
    $( "#payment_date" ).datepicker();
    $( "#start_date_only" ).datepicker();
    $( "#end_date_only" ).datepicker();
    $( "#register_date" ).datepicker();
    $( "#registration_confirm_date" ).datepicker();
    $( "#attendance_confirm_date" ).datepicker();
    $( "#arrived_at" ).datepicker();
    $( "#departed_at" ).datepicker();
    $( "#canceled_at" ).datepicker();
    $( "#birth_date" ).datepicker();
    $( "#deceased_date" ).datepicker();
    $( "#touched_at" ).datetimeEntry({
        datetimeFormat:'N d, Y h:M a' });
    $( "#q" ).autocomplete({
	  source: "{{ url('search/autocomplete') }}",
	  minLength: 3,
          autoFocus: true,
	  select: function(event, ui) {
	  	$('#q').val(ui.item.value);
                $('#response').val(ui.item.id);
                $('#btnSearch').click();
	  }
	});
    $("#languages").select2({
        placeholder: 'Choose language(s)'
    });
    $("#referrals").select2({
        placeholder: 'Choose referral source(s)'
    });
   $("#directors").select2({
        placeholder: 'Choose retreat director(s)'
    });
   $("#captains").select2({
        placeholder: 'Choose captain(s)'
    });
   $("#groups").select2({
        placeholder: 'Choose group(s)'
    });
   $("#roles").select2({
        placeholder: 'Choose role(s)',
        closeOnSelect: false
    });
   $("#permissions").select2({
        placeholder: 'Choose permission(s)',
        closeOnSelect: false
    });
   $("#users").select2({
        placeholder: 'Choose user(s)',
        closeOnSelect: false
    });
    
        
  });
  
  
  </script>
</body>
</html>
