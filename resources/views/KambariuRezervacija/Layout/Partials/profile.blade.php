<ul class="nav navbar-nav navbar-right">
	<li><p class="navbar-text">Sveiki, {{ Auth::user()->email }}</p></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><span class="glyphicon glyphicon-user" aria-hidden="true"></span></b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu">
            <li>
                <div class="row" id="login_field">
                    <div class="col-md-12">
                        <img src="Style/Images/avatar.jpg" width="250px" height="250px" alt="..." class="img-thumbnail img-responsive">
                    </div>
                    <div class="bottom text-center">
                       <a class="btn btn-danger btn-block" href="{{ url('/logout') }}" role="button">Atsijungti <span class=" glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>