@extends('KambariuRezervacija.Layout.main')

@section('title','|Visos ataskaitos')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Paslaugų populiarumo ataskaitos</h1>
    </div>

    <div class="col-md-2">
      {{ Form::select('size', ['L' => 'Paslaugų ataskaita', 'K' => 'Kambarių ataskaita', 'M' => 'Klientų kambarių ataskaita', 'S' => 'Mokėjimų ataskaita', 'N' => 'Klientų ataskaita'], 'L', array('class'=>'form-control','style'=>'width: 100%;')) }}
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-6">
      <table class="table">
        <thead>
          <th>Nr.</th>
          <th>Paslauga</th>
          <th>Paslaugos tipas</th>
          <th>Kaina</th>
          <th>Populiarumas</th>
        </thead>
        <tbody>
              <td>1</td>
              <td>Maistas į kambarį</td>   
              <td>Pietūs šeimai</td>  
              <td>20 eurų</td>  
              <td>6</td>                   
          </tr>

        </tbody>
      </table>
    </div>
  </div>

 
@endsection

