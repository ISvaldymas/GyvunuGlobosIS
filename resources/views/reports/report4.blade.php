@extends('KambariuRezervacija.Layout.main')

@section('title','|Visos ataskaitos')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Mokėjimų ataskaitos</h1>
    </div>

    <div class="col-md-2">
      {{ Form::select('size', ['L' => 'Paslaugų ataskaita', 'K' => 'Kambarių ataskaita', 'M' => 'Klientų kambarių ataskaita', 'S' => 'Mokėjimų ataskaita', 'N' => 'Klientų ataskaita'], 'S', array('class'=>'form-control','style'=>'width: 100%;')) }}
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>Rezervacijos Nr.</th>
          <th>Rezervacijos data</th>
          <th>Apsigyvenimo data</th>
          <th>Išvykimo data</th>
          <th>Už kambarį</th>
          <th>Už gyvenamą laikotarpį</th>
          <th>Už patogumus</th>
          <th>Už pramogas</th>
          <th>Už dekoracijas</th>
          <th>Už papildomas paslaugas</th>
          <th>Bendra suma</th>
        </thead>
        <tbody>
              <td>1</td>
              <td>2016-12-20</td>   
              <td>2016-12-25</td>  
              <td>2017-01-10</td> 
              <td>30 eurų</td> 
              <td>10 eurų</td> 
              <td>10 eurų</td>  
              <td>20 eurų</td>  
              <td>15 eurų</td>
              <td>11 eurų</td>
              <td>96 eurai</td>                    
          </tr>
        </tbody>
      </table>
    </div>
  </div>

 
@endsection

