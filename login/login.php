<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v3 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="c.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('img/fondo4.png'); background-position: center;">
			<div class="inner">

				<form action="login.php" method="post">
					<h3>Iniciar Sesion</h3>
					<div class="form-wrapper">
						<div class="form-wrapper">
							<label>Correo Electronico:</label>
							<div class="form-holder">
								<i style="font-style: normal; font-size: 17px; color: black;">@</i>
								<input type="text" name="correo" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-wrapper">
						<div class="form-wrapper">
							<label for="">Contraseña:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-lock-outline" style="color: black;"></i>
								<input type="password" name="password" class="form-control" placeholder="********">
							</div>
						</div>
					</div>
					<a class="crear_cuenta" href="registrar.php">Crear cuenta</a>
					<br><br>
					<a class="crear_cuenta" href="../index.php">Entrar como invitado</a>
					<div class="form-end">
						<div class="button-holder">
						<input class="button" type="submit" name="btn_iniciar" value="Iniciar Sesion">
						</div>
						
					</div>
				</form>
				
			</div>
		</div>

		<?php
if (isset($_POST['btn_iniciar'])) {
    include "conexion.php";
    session_start();

    // Escapar los inputs para evitar inyección SQL
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    $encript = md5($password); // Mejor usar password_hash en producción

    // Ejecutar la consulta
    $consulta = mysqli_query($conexion, 
        "SELECT * FROM clientes WHERE correo = '$correo' AND clave = '$encript';"
    );

    if (!$consulta) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    $numero = mysqli_num_rows($consulta);

    if ($numero == 1) {
        $fila = mysqli_fetch_assoc($consulta);

        // Guardar los datos en la sesión
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellidos'] = $fila['apellidos'];
        $_SESSION['nacimiento'] = $fila['nacimiento'];
        $_SESSION['rol'] = $fila['rol'];
        $_SESSION['ciudad'] = $fila['ciudad'];
        $_SESSION['genero'] = $fila['genero'];
        $_SESSION['correo'] = $fila['correo'];

        // Depuración para ver el rol recuperado
        echo "<script>console.log('Rol del usuario: " . $fila['rol'] . "');</script>";

        // Verificar el rol y redirigir
        if ($fila['rol'] === "Administrador" || $fila['rol'] === "Administradora") {
            echo "<script>window.location='dashboard/dashboard.php';</script>";
            exit();
        } elseif ($fila['rol'] === "Cliente") {
            echo "<script>window.location='../index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Rol desconocido');</script>";
        }
    } else {
        echo "<script>alert('Correo y/o contraseña incorrectos');</script>";
    }
}
?>

		
	</body>
</html>