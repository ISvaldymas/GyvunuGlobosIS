@extends('KambariuRezervacija.Layout.main')

@section('title','|Visi kambariai')

@section('width') <div class="col-md-12"> @endsection

@section('content')

            <div class="col-md-6 well ">
                <h1>Kurti naują pranešimą</h1>
                <hr>
                <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}

                    {!! Form::open(array('route' => 'email.store', 'data-parsley-validate' =>'', 'files' => true)) !!}
                    {{ Form::label('email','Gavėjas:') }}
                    {{ Form::text('email', null, array('class' => 'form-control', 'required' => '')) }}


                    {!! Form::open(array('route' => 'email.store', 'data-parsley-validate' =>'', 'files' => true)) !!}
                    {{ Form::label('subject','Tema:') }}
                    {{ Form::text('subject', null, array('class' => 'form-control', 'required' => '')) }}


                    {{ Form::label('message','Žinutė:') }}
                    {{ Form::textarea('message',null, array('class' => 'form-control', 'required' => '','minlength' => '10', 'maxlength' => '255')) }}


                    <input type="submit" value="Siųsti" class="btn btn-success">
                    {!! Form::close() !!}
                </form>
            </div>

         <div class="col-md-6 well">
                <h1>Visi išsiųsti laiškai</h1>
                <hr>

  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-6">
      <table class="table">
        <thead>
          <th>Tema</th>
          <th>Gavėjo email</th>
          <th>Data</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
       @foreach ($data['message'] as $mes)
        <tr>
        <td>{{ substr($mes->subject, 0, 30) }}{{ strlen($mes->subject) > 30 ? "..." : "" }}</td>
        <td>{{ substr($mes->email, 0, 50) }}</td>
        <td>{{ substr($mes->created_at, 0, 50) }}</td>
        <td><a href="{{ route('email.show', $mes->id) }}" class="btn btn-primary btn-sm" style="float: right;">Plačiau</a><a href="{{ route('email.destroy', $mes->id) }}" class="btn btn-primary btn-sm " style="float: right;">Naikinti</a></td>
        </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
 </div> 
@endsection