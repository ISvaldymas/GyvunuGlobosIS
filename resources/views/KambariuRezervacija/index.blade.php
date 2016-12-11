@extends('KambariuRezervacija.Layout.main')
@section('title', ' Pagrindinis')
@section('search') @include('KambariuRezervacija.Layout.Partials.search') @endsection
@section('slider') @include('KambariuRezervacija.Layout.Partials.slider') @endsection
@section('width') <div class="col-md-9"> @endsection
@section('content')
 

  @foreach ($data['rooms'] as $room)

  <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">          
      @if($room->photo_fk != NULL)
        <img src="{{ asset($room->photo_fk) }}" width="320" height="150" alt="Avatar" id="avatar_show" class="img-thumbnail">
      @else
       <img src="/Style/Images/avatar2.jpg" width="320" height="150" alt="Avatar" id="avatar_show" class="img-thumbnail">
      @endif
      <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
          <div class="caption">
              <h4 class="pull-right">{{$room->price}} €</h4>
         
              @if($room->room_type_fk  == '0')

              <h4><a href="{{ route('rooms.show', $room->id) }}">Vienvietis kambarys</a>
              @endif
              @if($room->room_type_fk  == '1')
              <h4><a href="{{ route('rooms.show', $room->id) }}">Dvivietis kambarys</a>
              @endif
              @if($room->room_type_fk  == '2')
              <h4><a href="{{ route('rooms.show', $room->id) }}">Trivietis kambarys</a>
              @endif
              @if($room->room_type_fk  == '3')
              <h4><a href="{{ route('rooms.show', $room->id) }}">Keturvietis kambarys</a>
              @endif
              </h4>
              <p>{{ substr($room->body, 0, 50) }}{{ strlen($room->body) > 50 ? "..." : "" }} </p>
          </div>
          <div class="ratings">
              <p class="pull-right">TOP pasiūlymas!</p>
              <p>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
              </p>
          </div>
      </div>
      </div>
  </div>

  @endforeach

  <div class="col-sm-4 col-lg-4 col-md-4">
      <h4><a href="#">Norite sužinoti daugiau informacijos?</a>
      </h4>
      <p>Prisijunkite prie sistemos! </p>

  </div>
    </div>
@endsection