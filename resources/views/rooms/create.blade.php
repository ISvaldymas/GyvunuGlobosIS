@extends('KambariuRezervacija.Layout.main')

@section('title','|Pridėti kambarį')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="col-md-12 alert alert-info text-center" role="alert">
    <strong>Naujo kambario kūrimas:</strong> Pridėkite norimą informacija.
  </div>


<div class="col-md-12 well">
  <div class="col-md-6 well">
      <h1>Pridėti naują kambarį</h1>
      <hr>

      {!! Form::open(array('route' => 'rooms.store', 'data-parsley-validate' =>'', 'files' => true)) !!}
        {{ Form::label('number','Kambario numeris:') }}
        {{ Form::number('number',0, array('class' => 'form-control', 'required' => '')) }}
        {{ Form::label('price','Kaina:') }}
        {{ Form::number('price','0', array('class' => 'form-control', 'required' => '','min' => '0')) }}

      
        <div class="form-group">
            <label for="">Kambario tipas</label>
            {{ Form::select('room_type_fk', $data['room'],null,array('class'=>'form-control','style'=>'width: 25%;')) }}
        </div>
      
        <div class="checkbox" name="room_type_fk">
        @foreach($data['cat'] as $type)  
              <label>
                <input type="checkbox" name="amenities[]" value="{{ $type->id }}">{{ $type->name }}
              </label>        
               </br>
        @endforeach
        </div>
        {{ Form::label('body','Aprašymas:') }}
        {{ Form::textarea('body',null, array('class' => 'form-control', 'required' => '','minlength' => '10', 'maxlength' => '255')) }}
  </div>
  <div class="col-md-6 well ">
    <h1>Kambario nuotrauka</h1>
    <hr>
        <img src="/Style/Images/avatar2.jpg" width="440" height="250" alt="Avatar" id="avatar_show" class="img-thumbnail " style="margin-top: 20px;" />

      <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
      <input style="margin: 0 auto !important" type="file" id="avatar" name="avatar">
      @if ($errors->has('avatar'))
          <span class="help-block">
              <strong>{{ $errors->first('avatar') }}</strong>
          </span>
      @endif
      <br><button id="remove_button" type="button" class="hidden btn btn-danger btn-lg" style="width:250px;"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Pašalinti</button>
    </div>
    </div>
</div>
        {{ Form::submit('Pridėti', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
        {!! Form::close() !!}

  </div>
  
@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>

@endsection
