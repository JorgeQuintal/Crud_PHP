<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/estiloslogin.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
</head>
<body>
<div class="contenedor"  >
	<div class="login-box "  >
	<div class="row" >
	<div class="col-md-10 ">
		<h2>Login</h2>
		<form action="validar.php" method="post">
			<div class="form-group">
				
				<input type="text" name="nombre" class="form-control" required placeholder="Nickname">
			</div>
			<div class="form-group">
				
				<input type="password" name="pass" class="form-control" required placeholder="Password">		 
			</div>
			<button type="submit" class="btn btn-primary">Aceptar</button>
			<a href="registro.php" class="btn btn-danger">Registrar</a>
			
		</form>
			
	</div>
	</div>
	</div>

</div>

</body>
</html>