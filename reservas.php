<?php
require_once 'autoload.php';

$eventos = EventsDAO::tolistPendientes();

?>
<!DOCTYPE html>

<html>
    <head>
        
        <?php require_once './includes/assets.php'; ?>
        
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
                <a class="navbar-brand" href="#"><img src="img/Control-TecLabs.png"></a>
            </div>
                
        </div>
        <!-- /.container-fluid -->
        </nav>
        
        <div class="container-fluid wrapper">
            
            <div class="page-header">
                <h2>Reservas</h2>
            </div>
            
            <?php Flash::show() ?>
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Resultado de búsqueda</h2>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Motivo</th>
                            <th>Laboratorio</th>
                            <th>Inicio</th>
                            <th>Fin</th>    
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($eventos as $evento){?>
                        <tr>
                            <td><?=$evento->users_id?></td>
                            <td><?=$evento->title?></td>
                            <td><?=$evento->rooms_id?></td>
                            <td><?=$evento->start?></td>
                            <td><?=$evento->end?></td>
                            <td><a href="events-state.php?id=<?=$evento->id?>&state=1" class="btn btn-success">Aceptar</a></td>
                            <td><a href=="events-state.php?id=<?=$evento->id?>&state=2" class="btn btn-sm btn-danger">Rechazar</a></td>
                        </tr>  
                        <?php } ?> 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="panel-footer">
                    <a href="" class="btn btn-success">Nuevo</a>
                </div>
            </div>
            
        </div>              
    
    </body>
    
    <?php require_once './includes/footer.php';?>
    
</html>