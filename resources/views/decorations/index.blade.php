@extends('KambariuRezervacija.Layout.main')

@section('title','|Visos dekoracijos')

@section('width') <div class="col-md-12"> @endsection


@section('content')

<div class="row">
    <div class="col-md-10">
      <h1>Dekoracijos</h1>
    </div>

    <div class="col-md-2">
      <!-- <a href="{{ route('decorations.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Pridėti dekoravimą</a> -->
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>Dizainas</th>
          <th>Tema</th>
          <th>Spalva</th>
          <th>Muzika</th>
          <th>Aprašymas</th>
          <th>Kaina</th>
        </thead>

        <tbody>       
          @foreach ($data['decoration'] as $decoratio)      
            <tr>

			  @if($decoratio->design_fk  == '0')
              <td>tradicinis</td>
              @elseif($decoratio->design_fk  == '1')
               <td>minimalistinis</td>
              @elseif($decoratio->design_fk  == '2')
               <td>kaimiškas</td>
               @elseif($decoratio->design_fk  == '3')
               <td>gotikinis</td>
              @endif

              @if($decoratio->theme_fk  == '0')
              <td>Halloween</td>
              @elseif($decoratio->theme_fk  == '1')
               <td>Kalėdos</td>
              @elseif($decoratio->theme_fk  == '2')
               <td>Nauji metai</td>
              @elseif($decoratio->theme_fk  == '3')
               <td>Gimtadienis</td>
              @endif

              @if($decoratio->color_fk  == '0')
              <td>juoda</td>
              @elseif($decoratio->color_fk  == '1')
               <td>žalia</td>
              @elseif($decoratio->color_fk  == '2')
               <td>mėlyna</td>
              @elseif($decoratio->color_fk  == '3')
               <td>raudona</td>
               @elseif($decoratio->color_fk  == '3')
               <td>balta</td>
              @endif

              @if($decoratio->music_fk  == '0')
              <td>classic</td>
              @elseif($decoratio->music_fk  == '1')
               <td>metal</td>
              @elseif($decoratio->music_fk  == '2')
               <td>pop</td>
              @elseif($decoratio->music_fk  == '3')
               <td>rock</td>
               @elseif($decoratio->music_fk  == '3')
               <td>country</td>
              @endif

            <td>{{ substr($decoratio->body, 0, 50) }}{{ strlen($decoratio->body) > 50 ? "..." : "" }}</td> 
            <td>{{ $decoratio->price }} eur.</td>
			   
              <!-- <td><a href="{{ route('decorations.show', $decoratio->id) }}" class="btn btn-primary btn-sm" style="float: right;">Plačiau</a> -->
           
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

@endsection