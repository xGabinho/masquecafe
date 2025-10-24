<?php
    if(isset($_POST['Btn'])){
        include "conexion.php";

        // Sanitizar las entradas para prevenir inyecciones SQL
        $presentacion = mysqli_real_escape_string($conexion, $_POST['presentacion']);
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $TipoDoc = mysqli_real_escape_string($conexion, $_POST['TipoDoc']);
        $Numerodoc = mysqli_real_escape_string($conexion, $_POST['NumeroDoc']);
        $nacimiento = mysqli_real_escape_string($conexion, $_POST['FechaNacimiento']);
        $domicilio = mysqli_real_escape_string($conexion, $_POST['domicilio']);
        $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
        $celular = mysqli_real_escape_string($conexion, $_POST['celular']);
        $correo = mysqli_real_escape_string($conexion, $_POST['email']);
        $estudios = mysqli_real_escape_string($conexion, $_POST['estudios']);
        $segundarios = mysqli_real_escape_string($conexion, $_POST['segundarios']);
        $universitarios = mysqli_real_escape_string($conexion, $_POST['universitarios']);
        $posgrado = mysqli_real_escape_string($conexion, $_POST['posgrados']);
        $experiencia = mysqli_real_escape_string($conexion, $_POST['experiencia']);
        $ReferenciaLaboral = mysqli_real_escape_string($conexion, $_POST['ReferenciaLaboral']);
        $ReferenciasPersonales = mysqli_real_escape_string($conexion, $_POST['ReferenciasPersonales']);
        
        // Manejo de la imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $uploads_dir = 'uploads'; // Carpeta donde se guardarán las imágenes
            $tmp_name = $_FILES['imagen']['tmp_name'];
            $name = basename($_FILES['imagen']['name']);
            $uploadfile = "$uploads_dir/$name";
    
            // Crea la carpeta de destino si no existe
            if (!is_dir($uploads_dir)) {
                if (!mkdir($uploads_dir, 0777, true)) {
                    echo "<script>alert('Error al crear la carpeta de uploads.');</script>";
                    exit();
                }
            }
    
            // Mueve el archivo de la ubicación temporal a la carpeta de destino
            if (move_uploaded_file($tmp_name, $uploadfile)) {
                $imagen = $uploadfile;
            } else {
                echo "<script>alert('Error al cargar la imagen.');</script>";
                exit();
            }
        } else {
            // Si no se subió una imagen, asigna una imagen por defecto
            $imagen = 'uploads/default.png'; // Asegúrate de tener una imagen por defecto en esta ruta
        }
    
        // Consulta para insertar los datos en la base de datos
        $query = "INSERT INTO `hojadevidapersonal` (`presentacion`, `nombre`, `TipoDocumento`, `identificacion`, `FechaNacimiento`, `domicilio`, `telefono`, `celular`, `correo`, `estudios`, `segundarios`, `universitarios`, `posgrados`, `experiencia`, `ReferenciaLaboral`, `ReferenciasPersonales`, `imagen`) 
                  VALUES ('$presentacion', '$nombre', '$TipoDoc', '$Numerodoc', '$nacimiento', '$domicilio', '$telefono', '$celular', '$correo', '$estudios', '$segundarios', '$universitarios', '$posgrado', '$experiencia', '$ReferenciaLaboral', '$ReferenciasPersonales', '$imagen');";
    
        $registrar = mysqli_query($conexion, $query);
    
        if ($registrar) {
            echo "<script>alert('Hoja de vida creada exitosamente');</script>";
            echo "<script>window.location='dashboard.php?mod=crear_hoja';</script>";
        } else {
            echo "<script>alert('Error al crear la hoja de vida en la base de datos: " . mysqli_error($conexion) . "');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión De Hoja de Vida</title>
    <!-- Agrega los enlaces a Bootstrap y FontAwesome si los usas -->
    <style>
        .imagen-superior-derecha {
            margin-top: -15px !important;
            width: 150px;
            margin: 20px auto;
            text-align: center;
        }

        .form_gestionar {
            overflow: hidden; /* Para que los elementos floten correctamente */
            background-color: #fff; /* Blanco */
            padding: 20px;
            color:black;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #000;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            vertical-align: top;
        }

        th {
            text-align: left;
            background-color: #f4f4f4; /* Gris claro */
            font-weight: bold;
            color: black; /* Negro */
        }

        .input, .large-input {
            padding: 8px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            overflow: auto;
            resize: none;
            background-color: #292929;
            color: white;
        }

        .input {
            width: 100%;
            background: white;
        }

        .input::placeholder{
            color: black;
        }

        .large-input {
            width: 100%;
            max-width: 100%; /* Asegura que el ancho no exceda el contenedor */
            height: 100px; /* Ajusta la altura según sea necesario */
            min-width: 200px; /* Ancho mínimo para los campos grandes */
            background: white;
        }

        .large-input::placeholder{
            color: black;
        }

        .input[type="file"] {
            padding: 5px;
        }

        .input[type="submit"] {
            background-color: #df9239;; 
            color: black; 
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }


        select {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            background-color: white;
            color: grey;
        }
    </style>
</head>
<body>
<center>
    <h1 style="color: #6f2503; font-size: 40px;">Trabajadores</h1>
    <h1 style="color: #6f2503; font-size: 40px;">Hoja de vida</h1>
    <form action="dashboard.php?mod=crear_hoja" enctype="multipart/form-data" method="post" class="form_gestionar">

        <div class="imagen-superior-derecha">
            <h3 style="font-size:20px; color: black; font-weight: bold;">Imagen del trabajador</h3>
            <!-- Input de archivo oculto -->
            <input type="file" id="imagenInput" name="imagen" class="form-control-crear" accept="image/*" style="display: none;">
            
            <!-- Imagen que actuará como el selector de archivo -->
            <img src="uploads/default.png" id="imagenVista" alt="Selecciona una imagen" style="width: 100px; height: 100px; margin-top: 10px; cursor: pointer; border-radius: 5px;">
        </div>
        
        <table>
            <tr>
                <th>Carta de presentación</th>
                <td colspan="4"><textarea style="color:black;" class="large-input" name="presentacion" placeholder="Carta de presentación" required></textarea></td>
            </tr>
            <tr>
                <th>Nombre completo</th>
                <td colspan="2"><input style="color:black;" class="input" type="text" name="nombre" placeholder="Nombre" required></td>
                <th>Tipo de documento</th>
                <td>
                    <select name="TipoDoc" required>
                        <option value="">Seleccionar</option>
                        <option value="TI">TI</option>
                        <option value="CC">CC</option>
                        <option value="PPT">PPT</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Número de documento</th>
                <td colspan="4"><input style="color:black;" class="input" type="number" name="NumeroDoc" placeholder="Número de documento" required></td>
            </tr>
            <tr>
                <th>Fecha de nacimiento</th>
                <td><input style="color:black;" class="input" type="date" name="FechaNacimiento" required></td>
                <th>Domicilio</th>
                <td colspan="2"><input style="color:black;" class="input" type="text" name="domicilio" placeholder="Domicilio" required></td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td><input class="input" style="color:black;" type="number" name="telefono" placeholder="Teléfono" required></td>
                <th>Celular</th>
                <td colspan="2"><input style="color:black;" class="input" type="number" name="celular" placeholder="Celular" required></td>
            </tr>
            <tr>
                <th>Correo</th>
                <td colspan="4"><input style="color:black;" class="input" type="email" name="email" placeholder="Email" required></td>
            </tr>
            <tr>
                <th>Estudios</th>
                <td><textarea style="color:black;" class="large-input" name="estudios" placeholder="Estudios" required></textarea></td>
                <th>Segundarios</th>
                <td colspan="2"><textarea style="color:black;" class="large-input" name="segundarios" placeholder="Segundarios" required></textarea></td>
            </tr>
            <tr>
                <th>Universitarios</th>
                <td><textarea class="large-input"  style="color:black;" name="universitarios" placeholder="Universitarios" required></textarea></td>
                <th>Posgrados</th>
                <td colspan="2"><textarea style="color:black;" class="large-input" name="posgrados" placeholder="Posgrados" required></textarea></td>
            </tr>
            <tr>
                <th>Experiencia</th>
                <td colspan="4"><textarea style="color:black;" class="large-input" name="experiencia" placeholder="Experiencia" required></textarea></td>
            </tr>
            <tr>
                <th>Referencia laboral</th>
                <td colspan="4"><textarea style="color:black;" class="large-input" name="ReferenciaLaboral" placeholder="Referencia laboral" required></textarea></td>
            </tr>
            <tr>
                <th>Referencias personales</th>
                <td colspan="4"><textarea style="color:black;" class="large-input" name="ReferenciasPersonales" placeholder="Referencias personales" required></textarea></td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center; background-color: #df9239;"><input class="input" type="submit" name="Btn" value="Crear"></td>
            </tr>
        </table>
    </form>

    <script>
        document.getElementById('imagenVista').addEventListener('click', function() {
            document.getElementById('imagenInput').click();
        });

        document.getElementById('imagenInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagenVista').src = e.target.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>
</center>
</body>
</html>
