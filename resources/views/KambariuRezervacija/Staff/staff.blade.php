@extends('KambariuRezervacija.Layout.main')
@section('title','|Visi kambariai')
@section('width') <div class="col-md-12"> @endsection
@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>Darbuotojai</h1>
    </div>

    <div class="col-md-4">
      <a href="{{ route('staff.create') }}" class="btn btn-lg btn-block btn-success btn-h1-spacing">Registruoti naują darbuotoją</a>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-8">
      <table class="table">
        <thead>
          <th> </th>
          <th>El. paštas</th>
          <th>Būsena</th>
          <th></th>
        </thead>

        <tbody>
          @if(count($data['users']) == 0)
            Nėra darbuotojų.
          @endif
          @foreach ($data['users'] as $user)
          <tr>
              <td>
                @if($user->information_fk && $user->user_information->photo_fk != 0)
                    <img src="/{{ $user->user_information->photo->url }}" class="img-circle" width="150" height="150" alt="">
                @else
                    <img src="/Style/Images/avatar.jpg" class="img-circle" width="150" height="150" alt="">
                @endif
              </td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->state->name }}</td>
              <td>
                @if(!$user->information_fk)
                  <a href="{{ route('staff.edit', $user->id) }}" class="btn btn-primary btn-sm" style="float: right;">Baigti registracija</a>
                @else
                  <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary btn-sm" style="float: right;">Redaguoti</a>
                @endif
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $data['users']->links() }}
    </div>
  </div>
@endsection

