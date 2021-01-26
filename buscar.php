<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>PHP/Modal</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-expand-lg fixed-top navbar bg-danger">
  		

	  	<div class="collapse navbar-collapse" id="navbarColor02">
		    
		    <form class="form-inline my-2 my-lg-0" method="post" action="buscar.php">
		      <input class="form-control mr-sm-2" placeholder="Search" type="text" id="buscar" name="buscar">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		     
		    </form>
	  	</div>
	  	<a href="panel.php" class="btn btn-warning"></span>Inicio</a>
	</nav>
	<h1 class="page-header text-center">Lista de Productos</h1>
	<div class="row">
		<div class="col-sm-10">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo</a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Precio</th>
				</thead>
				<tbody>
					<?php
						// incluye la conexión
						include_once('conexion.php');

						$database = new Connection();
    					$db = $database->open();
						try{
							$buscar=$_POST['buscar'];

						    $sql = "SELECT * FROM productos WHERE nombre LIKE '";
						    $sql=$sql.$buscar."%'";
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['id']; ?></td>
						    		<td><?php echo $row['nombre']; ?></td>
						    		<td><?php echo $row['precio']; ?></td>
						  
						    		<td>
						    			<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
						    		</td>
						    		<?php include('edit_delete.php'); ?>
						    	</tr>
						    	<?php 
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//cerrar conexión
						$database->close();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('agregar_modal.php'); ?>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/custom.js"></script>
</body>
</html>
