@extends('KambariuRezervacija.Layout.main')

@section('title','|Visos pramogos')

@section('width') <div class="col-md-12"> @endsection


@section('content')

<div class="row">
    <div class="col-md-10">
      <h1>Pramogos</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('entertainments.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Pridėti pramogą</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>Pramogos tipas</th>
          <th>Tema</th>
          <th>Trukmė</th>
          <th>Kaina</th>
          <th>Aprašymas</th>
          <th></th>
        </thead>

        <tbody>       
          @foreach ($data['entertainments'] as $entertainment)      
            <tr>

			  @if($entertainment->activity_fk  == '0')
              <td>šokis</td>
              @elseif($entertainment->activity_fk  == '1')
               <td>spektaklis</td>
              @elseif($entertainment->activity_fk  == '2')
               <td>žaidimai</td>
              @endif

              @if($entertainment->theme_fk  == '0')
              <td>Halloween</td>
              @elseif($entertainment->theme_fk  == '1')
               <td>Kalėdos</td>
              @elseif($entertainment->theme_fk  == '2')
               <td>Nauji metai</td>
              @elseif($entertainment->theme_fk  == '3')
               <td>Gimtadienis</td>
              @endif


             <td>{{ $entertainment->duration }} val.</td>	
            <td>{{ $entertainment->price }} eur.</td>
			<td>{{ substr($entertainment->body, 0, 50) }}{{ strlen($entertainment->body) > 50 ? "..." : "" }}</td>	
			
              
              
              <td><a href="{{ route('entertainments.show', $entertainment->id) }}" class="btn btn-primary btn-sm" style="float: right;">Plačiau</a>
           
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

@endsection