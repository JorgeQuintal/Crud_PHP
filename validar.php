<?php

	session_start();
	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con, 'odzo2');
	if ($con->connect_error) {

   die("La conexion falló: " . $con->connect_error);
    }

	$nombre=$_POST['nombre'];
	$pass=md5($_POST['pass']);
	$consulta="SELECT * FROM usuarios WHERE nombre= '$nombre' and contrasena= '$pass'";
	$_SESSION['nombre']=$nombre;
	$result= mysqli_query($con, $consulta);

	$num= mysqli_num_rows($result);

	if ($num>0) {
		header('location:panel.php');

		# code...
	} else{
		 
		  echo '<script>alert("Usuario o Contraseña incorrectos")</script>';
        
	}
	mysqli_free_result($result);
	
	mysqli_close($con);

?>			