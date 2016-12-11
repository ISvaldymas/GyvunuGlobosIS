@extends('KambariuRezervacija.Layout.main')

@section('title','|Peržiūrėti pranešimo turinį')

@section('width') <div class="col-md-12"> @endsection

@section('content')



  <div class="row">
    <div class="col-md-10">
      <h1>Pranešimas</h1>
    </div>
      <div class="col-md-2">
      {!! Form::open(['route' => ['email.destroy', $data['mes'] -> id], 'method' => 'DELETE'])!!}
     {!! Form::submit('Pašalinti', ['class' => 'btn btn-lg btn-block btn-primary btn-h1-spacing','style' => 'margin-top:15px;'])!!}
     {!! Form::close() !!}
     </div>
    <div class="col-md-12">
      <hr>
    </div>

  <div class="col-md-10 well">
      <h1>Pranešimo turinys</h1>
      <hr>
    <h3>Tema: <small>{{ $data['mes']->subject }}</small></h3>
    <h3>Gavėjo email: <small>{{ $data['mes']->email }}</small></h3>

     <h3>Išsiuntimo data: <small>{{ $data['mes']->created_at }}</small></h3>

     <h3>Laiško turinys: <small>{{ $data['mes']->bodyMessage }}</small></h3>
 
        <td><a href="{{ route('email.index') }}" class="btn btn-primary btn-sm" style="float: right;">Atgal</a>
        </td>
         </div>
  </div>
@endsection
