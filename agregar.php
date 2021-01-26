<?php

	session_start();
	include_once('conexion.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':precio' => $_POST['precio'] )) ) ? 'Producto agregado correctamente' : 'Algo salió mal. No se puede agregar producto';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Rellene primero para agregar al formulario';
	}

	header('location: panel.php');
	
?>
