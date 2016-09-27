<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="reg_header" class="modal-title">Kambarių rezervacijos registracija</h4>
      </div>

      <form class="form" role="form" method="POST" action="{{ url('/register') }}" accept-charset="UTF-8" id="register_form">
          <div class="alert alert-danger" role="alert" id="reg_error" hidden ></div>
          {{ csrf_field() }}
          <div class="modal-body">
              <div class="form-group" id="reg_el">
                  <label class="sr-only" for="exampleInputEmail">Elektroninis paštas</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Elektroninis paštas" value="{{ old('email') }}" required>
              </div>
              <div class="form-group" id="reg_pasw">
                  <label class="sr-only" for="exampleInputPassword2">Slaptažodis</label>
                  <input type="password" class="form-control" minlength="6" name="password" id="password" placeholder="Slaptažodis" required>
              </div>  
              <div class="form-group" id="reg_conf_pasw">
                  <label class="sr-only" for="exampleInputPassword2">Pakartoti slaptažodis</label>
                  <input type="password" minlength="6" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Pakartoti slaptažodis" required>
              </div>                
          </div>
          <div class="modal-footer">
              <div class="form-group">
                  <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Registruotis</button>
              </div>
          </div>
      </form>

      <div class="row" id="registered_field" hidden>
          <div class="col-md-12 text-center">
              <span class="glyphicon glyphicon-info-sign" style="font-size: 8em; color: #428bca;" aria-hidden="true"></span>
              <hr>
              <div class="alert alert-warning" role="alert">
                <strong>Registracija(1/2):</strong><br/>I el. paštą buvo išsiųstas laiškas su patvirtinimo kodu. Neaglėsite pabaigti registracijos kol el. paštas nebus patvirtintas.
              </div>
          </div>
      </div>
    </div>
  </div>
</div>