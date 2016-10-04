@extends('KambariuRezervacija.Layout.main')

@section('title','|Peržiūrėti kambarį')

@section('width') <div class="col-md-12"> @endsection

@section('content')

  <div class="col-md-12 alert alert-info text-center" role="alert">
    <strong>Detali kambario informacija</strong> 
  </div>

  <div class="row">
    <div class="col-md-10">
      <h1>Kambariai</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Redaguoti</a>
      <a href="{{ route('rooms.destroy', $room->id) }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Naikinti</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

<div class="col-md-12 well">
	<div class="col-md-6 ">
		<h2>Kambario numeris: <small>{{ $room->number }}</small></h2>
		<h2>Kambario tipas: <small>{{ $room->room_type_fk }}</small></h2>
		<h2>Kambario kaina: <small>{{ $room->price }} eur.</small></h2>
		<h2>Kambario aprašymas: <small>{{ $room->body }}</small></h2>

      
  </div>
    <div class="col-md-6  ">

    <img src="/Style/Images/room.jpg" width="450" height="450" alt="Avatar" id="avatar_show" class="img-thumbnail" />
    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">

	<button type="button" class="btn btn-default" aria-label="Left Align">
	  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	</button>

	<button type="button" class="btn btn-default">
	  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	</button>
    
 
    </div>

  </div>
  </div>
        <td><a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary btn-sm">Redaguoti</a></td>
@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>
@endsection

