<?php
require_once 'autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php require_once './includes/assets.php'; ?>
    
    <script>
        
        $(function(){
           $('a.colorbox').colorbox({maxWidth:'95%', maxHeight:'95%'});
           
            $('#datetimepicker-start').datetimepicker({
                format: 'YYYY-MM-DDTHH:mm',
            });
            $('#datetimepicker-end').datetimepicker({
                format: 'YYYY-MM-DDTHH:mm',
                useCurrent: false, //Important! See issue #1075
            });
            $("#datetimepicker-start").on("dp.change", function (e) {
                $('#datetimepicker-end').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker-end").on("dp.change", function (e) {
                $('#datetimepicker-start').data("DateTimePicker").maxDate(e.date);
            });
        });
        
    	function confirmar(link, message){
    		bootbox.confirm((message)?message:"¿Realmente estas seguro?", function(result){ 
    			if(result){
    				window.location.href = link.href;
    			}
    		});
    		return false;
    	}
    	
    </script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    
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
                <a class="navbar-brand" href="#"><img src="img/logo.svg"></img></a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Niveles</a></li>
                    <li><a href="#">Alertas</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="http://lorempixel.com/32/32/people" width="32" height="32" class="img-circle special-img"> Luis Bueno <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mis datos</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout">Salir</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-2 col-sm-3">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Opciones</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Registro</a></li>
                    </ul>
                </div>
                
            </div>
            <div class="col-md-10 col-sm-9">
                
                <?php Flash::show() ?>
                
                <div class="panel panel-default">
                    <div class="panel-heading">Reserva de Laboratorio</div>
                    <div class="panel-body">
                        
                        <form action="events-register.php" method="post">
                            <div class="form-group">
                                <label for="users_id">Usuario</label>
                                <input type="text" id="users_id" class="form-control" value="Luis Bueno" readonly />
                                <input type="hidden" name="users_id" value="1" />
                            </div>
                            <div class="form-group">
                                <label for="title">T&iacute;tulo</label>
                                <input type="text" name="title" id="title" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="rooms_id">Laboratorios</label>
                                <select name="rooms_id" id="rooms_id" class="form-control">
                                    <option value="701">701</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start">Inicio</label>
                                <div class='input-group date' id='datetimepicker-start'>
                                    <input type="text" name="start" id="start" class="form-control" required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end">Fin</label>
                                <div class='input-group date' id='datetimepicker-end'>
                                    <input type="text" name="end" id="end" class="form-control" required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <input type="submit" value="Reservar" class="btn btn-primary"/>
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
    
    <?php require_once './includes/footer.php';?>
    
</body>
</html>