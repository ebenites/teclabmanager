<?php

// Variables en las cuales se ponen los parámetros necesarios para hacer la conexión a la base de datos
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "sistema2_usuarios";
$tbl_name = "credenciales";

// Cadena de conexión con la base de datos
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

// Mensaje de error en caso la conexión falle
if ($conexion->connect_error) {
	die("La conexion falló: " . $conexion->connect_error);
}

// Cadena SQL para buscar el usuario requerido
$buscarUsuario = "SELECT * FROM $tbl_name
WHERE name = '$_POST[name]' ";

// Ejecución de la cadena SQL 
$result = $conexion->query($buscarUsuario);

// Obtención de los registros a partir de la ejecución de la cadena SQL
$count = mysqli_num_rows($result);

	// Cadena SQL que permite ingresar el registro de usuario en la base de datos
	$query = "INSERT INTO credenciales (name, password)
          VALUES ('$_POST[name]', '$_POST[password]')";

	// Si la ejecución de la cadena de creación de usuario es exitosa, se redirigirá al usuario a la página que lista a todos los usuarios
	if ($conexion->query($query) === TRUE) { 
		header("Location: importante.html");
	}
	
	// Mensaje de error en caso no se pueda crear el usuario
	else {
		echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
	}	

// Cerrado de la conexión con la base de datos
mysqli_close($conexion);
?>