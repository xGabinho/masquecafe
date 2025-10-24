<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/dashboard/style/cre.css">
    <title>Document</title>
</head>
<body>
	<style>
:root{
    --main-color: #d6b991;
    --black: #292929;
    --bg: #131313;
    --border: .1rem solid rgba(255,255,255,.3)
}
body{
	color: white;
}
.wrapper. {
	min-height: 100vh;
	background-size: cover;
	background-repeat: no-repeat;
	display: flex;
	align-items: center;
}
.h3{
	margin-left: 32%;
	padding: 5px;
	color: #6f2503;
	font-weight: bold;
}
.inner {
	max-width: 850px;
	margin: auto;
	background: transparent;
	padding: 15px;
}
.form-crear {
	border: 1px solid #d3cccc;
	border-radius: 12px !important;
	padding: 62px 65px 64px;
	background: white;
	box-shadow: 0px 5px 10px grey;
}
.form-group {
	display: flex;
	.form-wrapper {
		width: 50%;
		&:first-child {
			margin-right: 40px;
		}
	}
}
.form-wrapper {
	margin-bottom: 27px;
	label {
		color: #6f2503;
		margin-bottom: 10px;
		display: block;
		text-transform: uppercase;
		font-weight: bold;
		font-size: 14px;
	}
}
.form-holder {
	position: relative;
	i {
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		left: 14px;
		font-size: 17px;
		color: bcscale;
	}
}
input::placeholder{
	color:#6f2503;
}
.form-control-crear {
	background-color: white;
	box-shadow: 0px 5px 10px grey;
	border-radius: 12px !important;
    border: none;
	display: block;
	width: 100%;
	height: 50px;
	padding: 0 20px 0 46px;
	color: #6f2503;
	font-size: 15px;
}
.button {
    border-radius: 12px !important;
	border: none;
	float: right;
	width: 152px;
	height: 42px;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 0;
	background-color: #df9239;
	font-size: 15px;
	color: white;
	text-transform: uppercase;
	-webkit-transform: perspective(1px) translateZ(0);
	transform: perspective(1px) translateZ(0);
	position: relative;
	-webkit-transition-property: color;
	transition-property: color;
	-webkit-transition-duration: 0.3s;
	transition-duration: 0.3s; }
  .form-end {
	display: flex;
	align-items: center;
	margin-top: 13px; 
  
  }
.button-holder {
	width: 50%;
	margin-left: 11% !important;
}

@media (max-width: 1199px) { 
	
}
@media (max-width: 991px) {
	
}
@media (max-width: 767px) {
	.wrapper {
		display: block;
	}
	form {
		padding: 0;
		border: none;
	}
	.form-group {
		display: block;
		.form-wrapper {
			width: 100%;
			&:first-child {
				margin-right: 0px;
			}
		}
	}
	.form-end {
		display: block;
	}
	.checkbox, .button-holder  {
		width: 100%;
	}
	.inner {
		padding: 30px 15px;
	}
	button {
		float: none;
		margin-top: 30px;
	}
	h3 {
		font-size: 30px;
		margin-bottom: 40px;
	}
}
  
	</style>
<?php
if(isset($_POST['btn_registrar'])){
    include "conexion.php";
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    if($password == $Cpassword){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $nacimiento = $_POST['nacimiento'];
        $rol = $_POST['rol'];
        $ciudad = $_POST['ciudad'];
        $genero = $_POST['genero'];
        $correo = $_POST['correo'];
        $encript = md5($password);

        $query = "INSERT INTO `clientes` (`nombre`, `apellidos`, `nacimiento`, `rol`, `ciudad`, `genero`, `correo`, `clave`) VALUES 
        ('$nombre', '$apellidos', '$nacimiento', '$rol', '$ciudad', '$genero', '$correo', '$encript');";

        $registrar = mysqli_query($conexion,$query);

        echo"<script>alert('Registro exitoso');</script>";
    }else{
        echo"<script>alert('Las contraseñas no coinciden');</script>";
    }
}
?>

<div class="wrapper"  style="background-image: url('img/fondo4.png'); background-position: center;">
			<div class="inner">

				<form action="dashboard.php?mod=crear" method="post" class="form-crear">
					<h1 class="h3">CREAR USUARIO</h1>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Nombre:</label>
							<div class="form-holder">
								<i class='bx bxs-user' style="color: #6f2503;"></i>
								<input type="text" name="nombre" class="form-control-crear" placeholder="Nombre">
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Apellidos:</label>
							<div class="form-holder">
								<i class='bx bxs-user' style="color: #6f2503;"></i>
								<input type="text" name="apellidos" class="form-control-crear" placeholder="Apellidos">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Fecha de nacimiento:</label>
							<div class="form-holder">
								<input type="date" name="nacimiento" class="form-control-crear">
								<i class='bx bxs-map' style="color: #6f2503;"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label >Rol:</label>
							<div class="form-holder">
								<select name="rol" class="form-control-crear">
									<option value="">Seleccionar</option>
									<option value="Administrador">Administrador</option>
									<option value="Administradora">Administradora</option>
									<option value="Cliente">Cliente</option>
								</select>
								<i class='bx bxs-user-account' style="color: #6f2503;"></i>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Ciudad:</label>
							<div class="form-holder">
								<select name="ciudad" class="form-control-crear">
									<option value="">Seleccionar</option>
									<option value="medellin">Medellin</option>
									<option value="cali">Cali</option>
									<option value="bogota">Bogota</option>
								</select>
								<i class='bx bxs-map' style="color: #6f2503;"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label >Genero:</label>
							<div class="form-holder">
								<select name="genero" id="" class="form-control-crear">
									<option value="">Seleccionar</option>
									<option value="hombre">Hombre</option>
									<option value="mujer">Mujer</option>
									<option value="other">Otro</option>
								</select>
								<i class='bx bx-street-view' style="color: #6f2503;"></i>
							</div>
						</div>
					</div>
					<div class="form-wrapper">
						<label for="">Correo electronico:</label>
						<div class="form-holder">
							<i class='bx bxs-envelope' style="color: #6f2503;"></i>
							<input type="email" name="correo" class="form-control-crear" placeholder="Correo">
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Contraseña:</label>
							<div class="form-holder">
								<i class='bx bxs-lock-alt' style="color: #6f2503;"></i>
								<input type="password" name="password" class="form-control-crear" placeholder="********">
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Confimar Contraseña:</label>
							<div class="form-holder">
								<i class='bx bxs-lock-alt' style="color: #6f2503;"></i>
								<input type="password" name="Cpassword" class="form-control-crear" placeholder="********">
							</div>
						</div>
					</div>



					<div class="form-end">
						<div class="button-holder">
							<input class="button" type="submit" name="btn_registrar" value="Crear usuario">
						</div>
					</div>
				</form>

			</div>
		</div>
</body>
