@extends('KambariuRezervacija.Layout.main')

@section('title','|Visi kambariai')

@section('width') <div class="col-md-12"> @endsection

@section('content')

            <div class="col-md-6 well ">
                <h1>Kurti naują pranešimą</h1>
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
          <th>Laiško turinys </th>
        </thead>
        <tbody>
       <!-- foreach ciklas -->
        <tr>
        <td>Kvietimas</td>
        <td>sandra.klezyte4@gmail.com</td>
        <td>2016-11-25</td>
        <td><a href="" class="btn btn-primary btn-sm" style="float: right;">Plačiau</a></td>
        </tr>
         <!-- foreach ciklo pabaiga -->
        </tbody>
      </table>
    </div>
  </div>
 </div> 
@endsection