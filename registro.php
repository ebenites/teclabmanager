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