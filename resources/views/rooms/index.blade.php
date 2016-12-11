@extends('KambariuRezervacija.Layout.main')

@section('title','|Visi kambariai')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Kambariai</h1>
    </div>
        @if(Auth::check())
        @if( Auth::user()->Role->id == 1)
        
    <div class="col-md-2">
      <a href="{{ route('rooms.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Pridėti kambarį</a>
      <a href="{{ route('amenities.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Pridėti patogumus</a>
    </div>
        @endif
        @endif
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th> </th>
          <th>Tipas</th>
          <th>Kaina</th>
          <th>Aprašymas</th> 

          <th></th>
        </thead>

        <tbody>
          
          @foreach ($data['rooms'] as $room)
            
            <tr>
           
      @if($room->photo_fk != NULL)
        <td><img src="{{ asset($room->photo_fk) }}" width="100" height="150" alt="Avatar" id="avatar_show" class="img-thumbnail" /></td>
      @else
        <td><img src="/Style/Images/avatar2.jpg" width="100" height="150" alt="Avatar" id="avatar_show" class="img-thumbnail" /></td>
      @endif
      <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">


              @if($room->room_type_fk  == '0')
              <td>Vienvietis</td>
              @elseif($room->room_type_fk  == '1')
               <td>Dvivietis</td>
              @elseif($room->room_type_fk  == '2')
               <td>Trivietis</td>
              @elseif($room->room_type_fk  == '3')
               <td>Keturvietis</td>
              @endif


              <td>{{ $room->price }} €</td>
     
              <td>{{ substr($room->body, 0, 50) }}{{ strlen($room->body) > 50 ? "..." : "" }}</td>

              <td><a href="{{ route('rooms.show', $room->id) }}" class="btn btn-default btn-sm" style="float: right;">Plačiau</a>
              @if(Auth::check())
              @if( Auth::user()->Role->id == 1)
               <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-default btn-sm" style="float: right;">Redaguoti</a>
               <a href="{{ route('rooms.destroy', $room->id) }}" class="btn btn-default btn-sm " style="float: right;">Naikinti</a> </td>
              @endif
              @endif
          </tr>
          @endforeach

        </tbody>
      </table>
       
    </div>
  </div>

 
@endsection

