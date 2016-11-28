<?php
spl_autoload_register(function ($class) {
    $dirs = array(
        'dto',     // Objetos de transferencia de datos
        'dao',     // Objetos de acceso a datos
        'common',  // Clases utiles
    );
    foreach($dirs as $dir) {
        $filename = "../../classes/$dir/$class.php";
        if (file_exists($filename)) {
            require_once($filename);
            return;
        }
    }
});

//$categorias = CategoriaDAO::listar();
//var_dump($categorias);

//$productos = ProductoDAO::listar();
//var_dump($productos);

var_dump(EventsDAO::tolist());
