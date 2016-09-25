<ul class="nav navbar-nav navbar-right">
    <li><p class="navbar-text">Registruotas vartotojas?</p></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Prisijungti</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu">
            <li>
                <div class="row" id="login_field">
                    <div class="col-md-12">
                        <form class="form" role="form" method="POST" action="{{ url('/login') }}" accept-charset="UTF-8" id="login_form">
                            {{ csrf_field() }}
                            <div class="alert alert-danger" role="alert" id="error"></div>
                            <div class="form-group">
                                <label class="sr-only" for="InputEmail">Elektroninis paštas</label>
                                <input type="email" class="form-control" id="email" placeholder="Elektroninis paštas" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="InputPassword">Slaptažodis</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Slaptažodis" required>
                                <div class="help-block text-right"><a href="{{ url('password/reset') }}">Pamiršote slaptažodį ?</a></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-primary btn-block">Prisijungti</button>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Likti prisijungusiam</label>
                            </div>
                        </form>
                    </div>
                    <div class="bottom text-center">
                        Neturite paskyros ? <a data-toggle="modal" href="#myModal"><b>Prisiregistruokite</b></a>
                    </div>
                </div>
                <div class="row" id="logged_field">
                    <div class="col-md-12 text-center">
                        <span class="glyphicon glyphicon-ok-circle" style="font-size: 8em; color: #5cb85c;" aria-hidden="true"></span>
                      <div class="alert alert-success" role="alert">
                        <strong>Sėkmingai prisijungta ...</strong>
                      </div>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>
@section('scripts')
    <script src="/Style/Js/login_register.js"></script>
@endsection