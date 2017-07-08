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
    
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Usuario</label>
                <div class="col-sm-2">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Usuario">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 control-label">Contraseña</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Recuerdame
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                    <button type="submit" class="btn btn-default">Ingresar</button>
                </div>
            </div>
        </form>
        
        <?php require_once './includes/footer.php';?>
    
    </body>
</html>