<ul class="nav navbar-nav navbar-right">
    <li class="dropdown" >
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><span class="glyphicon glyphicon-user" aria-hidden="true"></span></b> <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>
                @if(Auth::check() && Auth::user()->state->id == 1)
                    <div class="profile-sidebar" style="">
                        <div class="profile-userpic">
                            @if(Auth::user()->user_information->photo_fk != 0)
                                <img src="/{{ Auth::user()->user_information->photo->url }}" class="img-responsive" alt="">
                            @else
                                <img src="/Style/Images/avatar.jpg" class="img-responsive" alt="">
                            @endif
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                {{ Auth::user()->user_information->name .' '. Auth::user()->user_information->lastname }}
                            </div>
                            <div class="profile-usertitle-job">
                                {{ Auth::user()->email }}
                                @if(Auth::user()->Role->id == 1)
                                    <br/><font color="red">Administratorius</font>
                                @endif
                                    
                                @if(Auth::user()->Role->id == 2)
                                    <br/><font color="#f0ad4e">Darbuotojas</font>
                                @endif
                            </div>
                        </div>
                        <!--/ Administratorius -->
                        @if(Auth::user()->Role->id == 1)
                            <div class="profile-userbuttons">
                            <a class="btn btn-success btn-sm" href="{{ route('staff.index') }}" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Darbuotojai</a>
                            </div>
                        @endif
                        <!--/ Darbuotojas -->
                        @if(Auth::user()->Role->id == 2)
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Klientai</button>
                                <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Rezervacijos <span class="badge">8</span></button>
                            </div>
                        @endif
                        <!--/ Klientas -->
                        @if(Auth::user()->Role->id == 3)
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Rezervacijos <span class="badge">7</span></button>
                            </div>
                        @endif
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('profile.edit', Auth::user()->id) }}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Profilis </a>
                                </li>
                                <!--/ Administartorius -->
                                @if(Auth::user()->Role->id == 1)
                                    <li>
                                        <a href="{{ url('entertainments') }}">
                                        <i class="glyphicon glyphicon-music"></i>
                                        Pramogos </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                        Rezervacijos </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('report') }}">
                                        <i class="glyphicon glyphicon-list"></i>
                                        Ataskaitos </a>
                                    </li>    
                                    <li>
                                        <a href="{{ url('email') }}">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                        Pranešimai </a>
                                    </li>
                                @endif

                                <!--/ Darbuotojas -->
                                @if(Auth::user()->Role->id == 2)
                                    <li>
                                        <a href="{{ url('entertainments') }}">
                                        <i class="glyphicon glyphicon-music"></i>
                                        Pramogos </a>
                                    </li>
                                     <li>
                                        <a href="{{ url('decorations') }}">
                                        <i class="glyphicon glyphicon-scissors"></i>
                                        Dekoras </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('ereport') }}">
                                        <i class="glyphicon glyphicon-list"></i>
                                        Ataskaitos </a>
                                    </li>
                                @endif
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
