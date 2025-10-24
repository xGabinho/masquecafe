<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v3 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="registrar.css">
	</head>

	<body>

		<div class="wrapper"  style="background-image: url('img/fondo4.png'); background-position: center;">
			<div class="inner">

				<form action="codigo_registrar.php" method="post">
					<h3>Registrate</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Nombre:</label>
							<div class="form-holder">
								<i class='bx bxs-user' style="color: black;"></i>
								<input type="text" name="nombre" class="form-control">
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Apellidos:</label>
							<div class="form-holder">
								<i class='bx bxs-user' style="color: black;"></i>
								<input type="text" name="apellidos" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Fecha de nacimiento:</label>
							<div class="form-holder">
								<input type="date" name="nacimiento" class="form-control">
								<i class='bx bxs-map' style="color: black;"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label >Rol:</label>
							<div class="form-holder">
								<select name="rol" class="form-control">
									<option value="">Seleccionar</option>
									<option value="Cliente">Cliente</option>
								</select>
								<i class='bx bxs-user-account' style="color: black;"></i>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Ciudad:</label>
							<div class="form-holder">
								<select name="ciudad" class="form-control">
									<option value="">Seleccionar</option>
									<option value="medellin">Medellin</option>
									<option value="cali">Cali</option>
									<option value="bogota">Bogota</option>
								</select>
								<i class='bx bxs-map' style="color: black;"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label >Genero:</label>
							<div class="form-holder">
								<select name="genero" id="" class="form-control">
									<option value="">Seleccionar</option>
									<option value="hombre">Hombre</option>
									<option value="mujer">Mujer</option>
									<option value="other">Otro</option>
								</select>
								<i class='bx bx-street-view' style="color: black;"></i>
							</div>
						</div>
					</div>
					<div class="form-wrapper">
						<label for="">Correo electronico:</label>
						<div class="form-holder">
							<i class='bx bxs-envelope' style="color: black;"></i>
							<input type="email" name="correo" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Contraseña:</label>
							<div class="form-holder">
								<i class='bx bxs-lock-alt' style="color: black;"></i>
								<input type="password" name="password" class="form-control" placeholder="********">
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Confimar Contraseña:</label>
							<div class="form-holder">
								<i class='bx bxs-lock-alt' style="color: black;"></i>
								<input type="password" name="Cpassword" class="form-control" placeholder="********">
							</div>
						</div>
					</div>

					<a href="login.php" style="color:white; text-decoration:none; font-size:14px;">Volver al login</a>

					<div class="form-end">
						<div class="button-holder">
							<input class="button" type="submit" name="btn_registrar" value="Registrar">
						</div>
					</div>
					
				</form>

			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>