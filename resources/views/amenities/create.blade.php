@extends('KambariuRezervacija.Layout.main')

@section('title','|Pridėti patogumą')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="col-md-12 alert alert-info text-center" role="alert">
    <strong>Naujo patogumo kūrimas:</strong> Pridėkite norimą informacija.
  </div>


<div class="col-md-12 well">

  <div class="col-md-6 well ">
    <h1>Egzistuojantys patogumai:</h1>
    <hr>

        <div class="checkbox" name="room_type_fk">
        <table class="table">
        @foreach($data['cat'] as $type)  
          <tbody>
              {!! Form::open(['route' => ['amenities.destroy', $type->id], 'method' => 'DELETE'])!!}
              <label>
               <td><span class="glyphicon glyphicon-ok icon-success2"></span> {{ $type->name }}</span><td>
                    <td>{!! Form::submit('Pašalinti', ['class' => 'btn btn-sm btn-block btn-primary '])!!}</td>   
              </label>  
              {!! Form::close() !!}     
              </td> 
         </tbody>
        @endforeach

        </table>
        </div>

    </div>
  <div class="col-md-6 well">
      <h1>Pridėti naują patogumą</h1>
      <hr>
      {!! Form::open(array('route' => 'amenities.store', 'data-parsley-validate' =>'')) !!}
        <h3>Patogumo numeris: <small>{{ $data['cat1'] }}</small></h3>
        <h3>Patogumo pavadinimas:</h3>
        {{ Form::text('name',null, array('class' => 'form-control','required' => '')) }}
        {{ Form::submit('Pridėti', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
        {!! Form::close() !!}     
  </div>
</div>

</div>
  
@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>

@endsection
