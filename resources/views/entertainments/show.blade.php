@extends('KambariuRezervacija.Layout.main')

@section('title','|Peržiūrėti pramogą')

@section('width') <div class="col-md-12"> @endsection

@section('content')



  <div class="row">
    <div class="col-md-10">
      <h1>Pramoga</h1>
    </div>

    <div class="col-md-2">
     {!! Form::open(['route' => ['entertainments.destroy', $data['entertainment'] -> id], 'method' => 'DELETE'])!!}
     {!! Form::submit('Pašalinti', ['class' => 'btn btn-lg btn-block btn-primary btn-h1-spacing','style' => 'margin-top:15px;'])!!}
     {!! Form::close() !!}
     
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

<div class="col-md-12 well">
  <div class="col-md-12 well">
      <h1>Pramogos informacija</h1>
      <hr>
		  @if($data['entertainment']->activity_fk  == '0')
    <h3>Pramogos tipas: <small>šokis</small></h3>
    @elseif($data['entertainment']->activity_fk  == '1')
     <h3>Pramogos tipas: <small>spektaklis</small></h3>
    @elseif($data['entertainment']->activity_fk  == '2')
     <h3>Pramogos tipas: <small>žaidimai</small></h3>
     @endif

      @if($data['entertainment']->theme_fk  == '0')
    <h3>Pramogos tema: <small>Helovinas</small></h3>
    @elseif($data['entertainment']->theme_fk  == '1')
     <h3>Pramogos tema: <small>Kalėdos</small></h3>
    @elseif($data['entertainment']->theme_fk  == '2')
     <h3>Pramogos tema: <small>nauji metai</small></h3>
     @elseif($data['entertainment']->theme_fk  == '3')
     <h3>Pramogos tema: <small>Gimtadienis</small></h3>
     @endif

     <h3>Pramogos trukmė: <small>{{ $data['entertainment']->duration }} val</small></h3>
		<h3>Pramogos kaina: <small>{{ $data['entertainment']->price }} eur.</small></h3>
		<h3>Pramogos aprašymas: <small>{{ $data['entertainment']->body }}</small></h3>
  </div>
        <td><a href="{{ route('entertainments.index', $data['entertainment']->id) }}" class="btn btn-primary btn-lg" style="float: right;">    Atgal   </a></td>
        {{ Form::close() }}
  </div>
      
@endsection

