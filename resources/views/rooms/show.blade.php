@extends('KambariuRezervacija.Layout.main')

@section('title','|Peržiūrėti kambarį')

@section('width') <div class="col-md-12"> @endsection

@section('content')



  <div class="row">
    <div class="col-md-10">
      <h1>Kambariai</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Redaguoti</a>
     {!! Form::open(['route' => ['rooms.destroy', $room->id], 'method' => 'DELETE'])!!}
    

      {!! Form::submit('Pašalinti', ['class' => 'btn btn-lg btn-block btn-primary btn-h1-spacing'])!!}

       {!! Form::close() !!}
     
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

    @if($room->photo_fk != NULL)
        <img src="{{ asset($room->photo_fk) }}" width="250" height="250" alt="Avatar" id="avatar_show" class="img-thumbnail" />
    @else
        <img src="/Style/Images/avatar2.jpg" width="250" height="250" alt="Avatar" id="avatar_show" class="img-thumbnail" />
    @endif

 
    </div>

  </div>
  </div>
        <td><a href="{{ route('rooms.index', $room->id) }}" class="btn btn-primary btn-sm">Atgal</a></td>
@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>
@endsection

