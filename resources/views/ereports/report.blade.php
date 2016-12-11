@extends('KambariuRezervacija.Layout.main')

@section('title','|Visos ataskaitos')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Kambarių populiarumo ataskaitos</h1>
    </div>

    <div class="col-md-2">
      {{ Form::select('size', ['L' => 'Paslaugų ataskaita', 'K' => 'Kambarių populiarumo ataskaita'], 'K', array('class'=>'form-control','style'=>'width: 100%;')) }}
    </div>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-8">
      <table class="table">
        <thead>
          <th>Kambario nr.</th>
          <th>Vietų sk.</th>
          <th>Kaina</th>
          <th>Būsena</th>
          <th>Įvertinimas</th>
        </thead>
        <tbody>
              <td>240</td>
              <td>vienvietis</td>   
              <td>30 eurų</td>  
              <td>Laisvas</td>  
              <td>5 žvaigždutės</td>                    
          </tr>

        </tbody>
      </table>
    </div>
  </div>

 
@endsection

