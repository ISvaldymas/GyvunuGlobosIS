@extends('KambariuRezervacija.Layout.main')

@section('title','|Pridėti dekorą')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="col-md-12 alert alert-info text-center" role="alert">
    <strong>Naujo dekoro kūrimas:</strong> Pridėkite norimą informacija.
  </div>


<div class="col-md-12 well">
  <div class="col-md-12 well">
      <h1>Pridėti naują dekorą</h1>
      <hr>

      {!! Form::open(array('route' => 'decorations.store', 'data-parsley-validate' =>'', 'files' => true)) !!}

      <div class="form-group">
            <label for="">Dekoro dizainas</label>
            {{ Form::select('design_fk', $data['decoration'], null,array('class'=>'form-control','style'=>'width: 25%;')) }}
        </div>

        <div class="form-group">
            <label for="">Dekoro tema</label>
            {{ Form::select('theme_fk', $data['decoration'], null,array('class'=>'form-control','style'=>'width: 25%;')) }}
        </div>

        <div class="form-group">
            <label for="">Dekoro muzika</label>
            {{ Form::select('music_fk', $data['decoration'], null,array('class'=>'form-control','style'=>'width: 25%;')) }}
        </div>

        <div class="form-group">
            <label for="">Dekoro spalvos</label>
            {{ Form::select('color_fk', $data['decoration'], null,array('class'=>'form-control','style'=>'width: 25%;')) }}
        </div>

        {{ Form::label('price','Kaina:') }}
        {{ Form::number('price','0', array('class' => 'form-control', 'required' => '','min' => '0')) }}

        {{ Form::label('body','Aprašymas:') }}
        {{ Form::textarea('body',null, array('class' => 'form-control', 'required' => '','minlength' => '10', 'maxlength' => '255')) }}

        
  </div>
  
      <br><button id="remove_button" type="button" class="hidden btn btn-danger btn-lg" style="width:250px;"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Pašalinti</button>
    </div>
    </div>
</div>
        {{ Form::submit('Pridėti', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
        {!! Form::close() !!}

  </div>
  
@endsection
