@extends('KambariuRezervacija.Layout.main')

@section('title','|Visi išsųsti laiškai')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Visi išsųsti laiškai</h1>
    </div>

   
    <div class="col-md-10">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-10">
      <table class="table">
        <thead>
          <th>Adresatas(ai)</th>
          <th>Tema</th>
          <th>Žinutė</th>
          <th>Išsiuntimo laikas</th>
        </thead>

        <tbody>
          
         

        </tbody>
      </table>
    </div>
  </div>

 
@endsection

