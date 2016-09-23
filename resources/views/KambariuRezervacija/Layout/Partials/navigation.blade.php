    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">&#9734;&#9733;&#9733;&#9733;Hotel&#9733;&#9733;&#9733&#9734;</a>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active" >
                        <a href="#">Pagrindinis</a>
                    </li>
                    <li>
                        <a href="#">Kambariai</a>
                    </li>
                    <li>
                        <a href="#">Paslaugos</a>
                    </li>
                    <li>
                        <a href="#">Apie</a>
                    </li>
                   <li>
                        <a href="#">Kontaktai</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Registruotas vartotojas?</p></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Prisijungti</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Elektroninis paštas</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Elektroninis paštas" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Slaptažodis</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Slaptažodis" required>
                                                <div class="help-block text-right"><a href="">Pamiršote slaptažodį ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Prisijungti</button>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox"> Likti prisijungusiam</label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        Neturite paskyros ? <a data-toggle="modal" href="#myModal"><b>Prisiregistruokite</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Registartion form -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Kambarių rezervacijos registracija</h4>
            </div>
            <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Elektroninis paštas</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Elektroninis paštas" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Slaptažodis</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Slaptažodis" required>
                    </div>                
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Registruotis</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>