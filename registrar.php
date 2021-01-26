<?php

	session_start();
	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con, 'odzo2');
	if ($con->connect_error) {

   die("La conexion falló: " . $con->connect_error);
    }
	
	$nombre=$_POST['nombre'];
	$pass= md5($_POST['pass']);
	$s="SELECT * FROM usuarios WHERE nombre= '$nombre'";

	$result= mysqli_query($con, $s);

	$num= mysqli_num_rows($result);

	if ($num == 1) {
		echo'<script> alert("Nombre de usuario en uso")</script>';
		# code...
	} else{
		$reg=" INSERT INTO usuarios(nombre, contrasena) values('$nombre','$pass')";
		mysqli_query($con,$reg);
		header('location: index.php');
		
	}
	mysqli_free_result($result);
	mysqli_close($con);

?>			
			