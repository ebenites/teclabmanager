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
    
    <?php require_once './includes/header.php'; ?>
    
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
                
                <form action="events-register.php" method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">Reserva de Laboratorio</div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <label for="users_id">Usuario</label>
                                <input type="text" id="users_id" class="form-control" value="<?=$_SESSION['usuario']->fullname?>" readonly />
                                <input type="hidden" name="users_id" value="<?=$_SESSION['usuario']->id?>" />
                            </div>
                            <div class="form-group">
                                <label for="title">T&iacute;tulo</label>
                                <input type="text" name="title" id="title" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="rooms_id">Laboratorios</label>
                                <select name="rooms_id" id="rooms_id" class="form-control">
                                    <option value="701">701</option>
                                    <option value="702">702</option>
                                    <option value="703">703</option>
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
                            
                        </div>
                        <div class="panel-footer">
                            <input type="submit" value="Reservar" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        
    </div>
    
    <?php require_once './includes/footer.php';?>
    
</body>
</html>