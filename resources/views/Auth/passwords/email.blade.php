@extends('KambariuRezervacija.Layout.main')
@section('title', ' Slaptažodžio atsatymas')
@section('width') <div class="col-md-12" style="padding-top: 100px;" > @endsection
@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Slaptažodžio atsatymas</div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">El. paštas</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Atsatyti slaptažodį
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
