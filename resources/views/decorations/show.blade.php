@extends('KambariuRezervacija.Layout.main')

@section('title','|Peržiūrėti dekorą')

@section('width') <div class="col-md-12"> @endsection

@section('content')



  <div class="row">
    <div class="col-md-10">
      <h1>Pramoga</h1>
    </div>

    <div class="col-md-2">
     {!! Form::open(['route' => ['decorations.destroy', $data['decoration'] -> id], 'method' => 'DELETE'])!!}
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
		  @if($decoration->design_fk  == '0')
              <h3>tradicinis</h3>
              @elseif($decoration->design_fk  == '1')
               <h3>Dizainas: <small>minimalistinis</small></h3>
              @elseif($decoration->design_fk  == '2')
               <h3>Dizainas: <small>kaimiškas</small></h3>
               @elseif($decoration->design_fk  == '3')
               <h3>Dizainas: <small>gotikinis</small></h3>
              @endif

              @if($decoration->theme_fk  == '0')
              <h3>Tema: <small>Haloween</small></h3>
              @elseif($decoration->theme_fk  == '1')
               <h3>Tema: <small>Kalėdos</small></h3>
              @elseif($decoration->theme_fk  == '2')
              <h3>Tema: <small>nauji metai</small></h3>
              @elseif($decoration->theme_fk  == '3')
              <h3>Tema: <small>Gimtadienis</small></h3>
              @endif

              @if($decoration->color_fk  == '0')
              <h3>Spalva: <small>juoda</small></h3>
              @elseif($decoration->color_fk  == '1')
               <h3>Spalva: <small>žalia</small></h3>
              @elseif($decoration->color_fk  == '2')
              <h3>Spalva: <small>mėlyna</small></h3>
              @elseif($decoration->color_fk  == '3')
              <h3>Spalva: <small>raudona</small></h3>
               @elseif($decoration->color_fk  == '3')
               <h3>Spalva: <small>balta</small></h3>
              @endif

              @if($decoration->music_fk  == '0')
              <h3>Muzika: <small>classic</small></h3>
              @elseif($decoration->music_fk  == '1')
              <h3>Muzika: <small>metal</small></h3>
              @elseif($decoration->music_fk  == '2')
              <h3>Muzika: <small>pop</small></h3>
              @elseif($decoration->music_fk  == '3')
              <h3>Muzika: <small>rock</small></h3>
               @elseif($decoration->music_fk  == '3')
               <h3>Muzika: <small>country</small></h3>
              @endif

		<h3>Dekoravimo kaina: <small>{{ $data['decoration']->price }} eur.</small></h3>
		<h3>Dekoravimo aprašymas: <small>{{ $data['decoration']->body }}</small></h3>
  </div>
        <h3><a href="{{ route('decorations.index', $data['decoration']->id) }}" class="btn btn-primary btn-lg" style="float: right;">    Atgal   </a></h3>
        {{ Form::close() }}
  </div>
      
@endsection

