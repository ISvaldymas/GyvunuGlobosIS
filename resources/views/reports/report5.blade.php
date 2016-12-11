@extends('KambariuRezervacija.Layout.main')

@section('title','|Visos ataskaitos')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Klientų kambarių ataskaita</h1>
    </div>

    <div class="col-md-2">
      {{ Form::select('size', ['L' => 'Paslaugų ataskaita', 'K' => 'Kambarių ataskaita', 'M' => 'Klientų kambarių ataskaita', 'S' => 'Mokėjimų ataskaita', 'N' => 'Klientų ataskaita'], 'M',array('class'=>'form-control','style'=>'width: 100%;')) }}
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th></th>
          <th>Rezervacijos id</th>
          <th>Rezervacijos data</th>
          <th>Apsigyvenimo data</th>
          <th>Kambario nr.</th>
          <th>Patogumai</th>
          <th>Dekoracijos</th>
          <th>Pramogos</th>
          <th>Sumokėta</th>
        </thead>
        <!-- foreach ciklas -->
        <thead>
          <th> Jonas Petrauskas</th>
        </thead>
        <!-- foreach ciklas -->
        <tbody>
              <td></td>
              <td>1</td>
              <td>2016-12-20</td>   
              <td>2016-12-25</td>  
              <td>202</td>  
              <td>Wifi <br>
                  Telefonas<br>
                   Kavos aparatas</td>  
              <td>Tema: Kalėdos<br>
                  Spalva: Raudona<br>
                  Muzika: Metalas<br>
                  Dizainas: Gotikinis</td>
          	  <td>Spektaklis</td>
              <td>110 eurų</td>                    
          </tr>
          </tbody>
          <!-- end foreach -->
          <!-- end foreach -->
          <tbody>
              <td></td>
              <td>5</td>
              <td>2016-12-20</td>   
              <td>2016-12-25</td>  
              <td>101</td>  
              <td>Seifas <br>
                  Telefonas<br></td>  
              <td>Nepasirinkta</td>
              <td>Nepasirinkta</td>
              <td>60 eurų</td>                    
          </tr>
        </tbody>
      </table>
    </div>
  </div>

 
@endsection

