<?php
require_once './autoload.php';
require_once 'includes/security.php';
?>
<!DOCTYPE html>

<html>
    <head>
       
       <?php require_once './includes/assets.php'; ?>
       
    </head>
    <body>
        
        <?php require_once './includes/header.php'; ?>
    
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Reporte Actual</h2>
                        </div>
                        <div class="panel-body">
                            <img src="grafico.php" width="100%" class="img-responsive"></img>
                        </div>
                    </div>
                
                </div>
            </div>
            
        </div>
        
        <?php require_once './includes/footer.php';?>
    
    </body>
</html>