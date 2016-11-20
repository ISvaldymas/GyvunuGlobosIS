@extends('KambariuRezervacija.Layout.main')

@section('title','|Visi kambariai')

@section('width') <div class="col-md-12"> @endsection

@section('content')
        <div class="row">
            <div class="col-md-6">
                <h1>Paštas</h1>
                <hr>
                <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email">Adresatas:</label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject">Tema:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message">Žinutė:</label>
                        <textarea id="message" name="message" class="form-control">...</textarea>
                    </div>

                    <input type="submit" value="Siųsti" class="btn btn-success">
                </form>
            </div>
        </div>
@endsection