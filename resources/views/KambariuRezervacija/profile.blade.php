@extends('KambariuRezervacija.Layout.main')
@section('title', ' Registracija(2)')
@section('width') <div class="col-md-12"> @endsection
@section('content')
<form class="form" role="form" method="POST" action="" accept-charset="UTF-8" id="profile_update_form" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="col-md-12 alert alert-info text-center" role="alert">
    <strong>Profilio nustatymai:</strong> Atnaujinkite norimą informacija.
  </div>
  <div class="col-md-6 well">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Vardas</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="{{ Auth::user()->user_information->name }}" value="{{ old('name') }}" required>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
        <label for="lastname">Pavardė</label>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="{{ Auth::user()->user_information->lastname }}" value="{{ old('lastname') }}" required>
        @if ($errors->has('lastname'))
            <span class="help-block">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('age_group_fk') ? ' has-error' : '' }}">
        <label for="age_group_fk">Amžiaus grupė</label>
          <select class="form-control" id="age_group_fk" name="age_group_fk" required>
          @foreach($data as $age)
            @if($age->name == old('age_group_fk'))
              <option selected>{{ $age->name }}</option>
            @else
              <option>{{ $age->name }}</option>
            @endif
          @endforeach
          </select>
          @if ($errors->has('age_group_fk'))
              <span class="help-block">
                  <strong>{{ $errors->first('age_group_fk') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone">Telefonas</label>
        <input type="text" class="form-control" id="phone" placeholder="{{ Auth::user()->user_information->phone }}" name="phone" value="{{ old('phone') }}" required>
          @if ($errors->has('phone'))
              <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
        <label for="adress">Adresas</label>
        <input type="text" name="adress" class="form-control" id="adress" placeholder="{{ Auth::user()->user_information->adress }}" value="{{ old('adress') }}" required>
          @if ($errors->has('adress'))
              <span class="help-block">
                  <strong>{{ $errors->first('adress') }}</strong>
              </span>
          @endif
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" {{ old('newsletter_fk')==true ? 'checked' : '' }} name="newsletter_fk" id="newsletter_fk"> Gauti laiškus su naujienomis
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Išsaugoti</button>
  </div>
  <div class="col-md-6  text-center">
    <h3>Profilio nuotrauka</h3>
    <img src="/Style/Images/avatar.jpg" width="250" height="250" alt="Avatar" id="avatar_show" class="img-thumbnail" />
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
</form>
@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>
@endsection