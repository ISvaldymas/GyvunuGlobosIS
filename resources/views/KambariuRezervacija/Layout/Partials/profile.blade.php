<ul class="nav navbar-nav navbar-right">
    <li class="dropdown" >
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><span class="glyphicon glyphicon-user" aria-hidden="true"></span></b> <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>
                @if(Auth::check() && Auth::user()->state->id == 1)
                    <div class="profile-sidebar" style="">
                        <div class="profile-userpic">
                            @if(Auth::user()->user_information->photo_fk != 0)
                                <img src="{{ Auth::user()->user_information->photo->url }}" class="img-responsive" alt="">
                            @else
                                <img src="Style/Images/avatar.jpg" class="img-responsive" alt="">
                            @endif
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                {{ Auth::user()->user_information->name .' '. Auth::user()->user_information->lastname }}
                            </div>
                            <div class="profile-usertitle-job">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-success btn-sm">Rezervacijos <span class="badge">7</span></button>
                            <button type="button" class="btn btn-primary btn-sm">Pranešimai <span class="badge">8</span></button>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Profilio nustatymai </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Pagalba </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}" style="color:red;">
                                    <i class="glyphicon glyphicon-log-out"></i>
                                    Atsijungti </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="{{ url('/logout') }}" style="color:red;">
                    <i class="glyphicon glyphicon-log-out"></i>
                    Atsijungti </a>
                @endif
            </li>
        </ul>
    </li>
</ul>
