    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/Control-TecLabs.png"></img></a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos<span class="caret"></span></a>
                            
                            <ul class="dropdown-menu">
                                <?php if($_SESSION['usuario']->rol == 'A'){ ?>
                                    <li><a href="reportes.php">Reportes Antiguo</a></li>
                                    <li><a href="dashboard.php">Reportes</a></li>
                                    <li><a href="reservas.php">Pendientes</a></li>
                                <?php } ?>
                                <li><a href="events-new.php">Nuevo</a></li>
                            </ul>
                            
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="http://lorempixel.com/32/32/people" width="32" height="32" class="img-circle special-img"> <?=$_SESSION['usuario']->fullname?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mis datos</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">Salir</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>