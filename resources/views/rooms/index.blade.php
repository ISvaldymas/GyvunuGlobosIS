@extends('KambariuRezervacija.Layout.main')

@section('title','|Visi kambariai')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Kambariai</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('rooms.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Pridėti kambarį</a>
    </div>
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
        <td><img src="{{ asset($room->photo_fk) }}" width="150" height="150" alt="Avatar" id="avatar_show" class="img-thumbnail" /></td>
      @else
        <td><img src="/Style/Images/avatar2.jpg" width="150" height="150" alt="Avatar" id="avatar_show" class="img-thumbnail" /></td>
      @endif
      <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
      @if ($errors->has('avatar'))
          <span class="help-block">
              <strong>{{ $errors->first('avatar') }}</strong>
          </span>
      @endif</td>

              <td>{{ $room->types }}</td>
               <td>{{ $room->price }} eur.</td>
              <td>{{ substr($room->body, 0, 50) }}{{ strlen($room->body) > 50 ? "..." : "" }}</td>
              
              <td><a href="{{ route('rooms.show', $room->id) }}" class="btn btn-default btn-sm">Plačiau</a> <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-default btn-sm">Redaguoti</a><a href="{{ route('rooms.destroy', $room->id) }}" class="btn btn-default btn-sm">Naikinti</a></td>
            </tr>

          @endforeach

        </tbody>
      </table>
    </div>
  </div>

 
@endsection

