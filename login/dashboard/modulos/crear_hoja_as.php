<?php
    // Activar reporte de errores para depuración (Desactivar en producción)
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(isset($_POST['Btn'])){
        include "conexion.php";

        // Sanitizar las entradas para prevenir inyecciones SQL
        $apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $nacimiento = mysqli_real_escape_string($conexion, $_POST['nacimiento']);
        $LugarNacimiento = mysqli_real_escape_string($conexion, $_POST['LugarNacimiento']);
        $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
        $ciudad = mysqli_real_escape_string($conexion, $_POST['Viviendo']);
        $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
        $celular = mysqli_real_escape_string($conexion, $_POST['celular']);
        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        $nacionalidad = mysqli_real_escape_string($conexion, $_POST['nacionalidad']);
        $profesion = mysqli_real_escape_string($conexion, $_POST['profesion']);
        $EstadoCivil = mysqli_real_escape_string($conexion, $_POST['estado_civil']);
        $TiExperiencia = mysqli_real_escape_string($conexion, $_POST['TiExperiencia']);
        $TipoDoc = mysqli_real_escape_string($conexion, $_POST['TipoDoc']);
        $NumeroDoc = mysqli_real_escape_string($conexion, $_POST['NumeroDoc']);
        $expedicion = mysqli_real_escape_string($conexion, $_POST['expedicion']);
        $vehiculo = mysqli_real_escape_string($conexion, $_POST['vehiculo']);
        $licencia = mysqli_real_escape_string($conexion, $_POST['licenciaC']);
        $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
        $PerfilLaboral = mysqli_real_escape_string($conexion, $_POST['perfil_laboral']);
        $TraActualmente = mysqli_real_escape_string($conexion, $_POST['trabajaAc']);
        $empresa = mysqli_real_escape_string($conexion, $_POST['empresa']);
        $EmIn = mysqli_real_escape_string($conexion, $_POST['EmIn']);
        $TipoContrato = mysqli_real_escape_string($conexion, $_POST['tipo_contrato']);
        $TrabajoAntes = mysqli_real_escape_string($conexion, $_POST['trabajo_antes']);
        $SolicitoAntes = mysqli_real_escape_string($conexion, $_POST['saliantes']);
        $FechaSolicitud = mysqli_real_escape_string($conexion, $_POST['fecha_solicitud']);
        $ConoceEquipo = mysqli_real_escape_string($conexion, $_POST['conocido']);
        $NombreCono = mysqli_real_escape_string($conexion, $_POST['nombreCo']);
        $ParientesAqui = mysqli_real_escape_string($conexion, $_POST['parientes']);
        $NombrePariente = mysqli_real_escape_string($conexion, $_POST['nombrePa']);
        $ConociVacante = mysqli_real_escape_string($conexion, $_POST['vacante']);
        $TrabajoLugar = mysqli_real_escape_string($conexion, $_POST['OtroLugar']);
        $ViveCasa = mysqli_real_escape_string($conexion, $_POST['casa']);
        $NombreArre = mysqli_real_escape_string($conexion, $_POST['nombreArre']);
        $TeleArre = mysqli_real_escape_string($conexion, $_POST['TeleArre']);
        $TiempoResidencia = mysqli_real_escape_string($conexion, $_POST['tiempoR']);
        $IngresoAdicional = mysqli_real_escape_string($conexion, $_POST['ingresoA']);
        $cantidad = mysqli_real_escape_string($conexion, $_POST['cantidad']);
        $ObligacionesMensuales = mysqli_real_escape_string($conexion, $_POST['obligaciones']);
        $Conceptos = mysqli_real_escape_string($conexion, $_POST['conceptos']);
        $AspiracionSalarial = mysqli_real_escape_string($conexion, $_POST['aspiracion']);
        $PrincialAficion = mysqli_real_escape_string($conexion, $_POST['aficion']);
        $PracticaDeporte = mysqli_real_escape_string($conexion, $_POST['PracDeporte']);
        $CualDeporte = mysqli_real_escape_string($conexion, $_POST['deporte']);
        $ReconoActividades = mysqli_real_escape_string($conexion, $_POST['desempeño']);
        $CualDesempeño = mysqli_real_escape_string($conexion, $_POST['cualDesempeño']);

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
            echo "<script>alert('No se ha seleccionado ninguna imagen o ha ocurrido un error.');</script>";
            exit();
        }

        // Consulta para insertar los datos en la base de datos
        $query = "INSERT INTO `hojadevidaaspirante` (
                    `apellidos`, `nombre`, `nacimiento`, `lugar_nacimiento`, `direccion`, `ciudad`, 
                    `telefono`, `celular`, `correo`, `nacionalidad`, `profesion`, `estado_civil`, 
                    `tiempo_experiencia`, `tipo_documento`, `numero_documento`, `expedida`, `vehiculo`, 
                    `licencia_conducir`, `categoria`, `perfil_laboral`, `trabaja_actualmente`, 
                    `que_empresa`, `empleado_independiente`, `tipo_contrato`, `trabajo_antes`, 
                    `solicito_antes`, `fecha`, `conoce_equipo`, `nombre_conocido`, `parientes_aqui`, 
                    `nombre_pariente`, `conocimiento_vacante`, `trabajar_otro_lugar`, `vive_en_casa`, 
                    `nombre_arrendador`, `telefono_arrendador`, `tiempo_residencia`, `ingreso_adicional`, 
                    `cantidad`, `obligaciones_mensuales`, `porque_conceptos`, `aspiracion_salarial`, 
                    `principal_aficion`, `practica_deporte`, `cual`, `reconocimiento_actividades`, 
                    `cualDeporte`, `imagen`
                ) VALUES (
                    '$apellidos', '$nombre', '$nacimiento', '$LugarNacimiento', '$direccion', '$ciudad', 
                    '$telefono', '$celular', '$correo', '$nacionalidad', '$profesion', '$EstadoCivil', 
                    '$TiExperiencia', '$TipoDoc', '$NumeroDoc', '$expedicion', '$vehiculo', 
                    '$licencia', '$categoria', '$PerfilLaboral', '$TraActualmente', '$empresa', 
                    '$EmIn', '$TipoContrato', '$TrabajoAntes', '$SolicitoAntes', '$FechaSolicitud', 
                    '$ConoceEquipo', '$NombreCono', '$ParientesAqui', '$NombrePariente', 
                    '$ConociVacante', '$TrabajoLugar', '$ViveCasa', '$NombreArre', '$TeleArre', 
                    '$TiempoResidencia', '$IngresoAdicional', '$cantidad', '$ObligacionesMensuales', 
                    '$Conceptos', '$AspiracionSalarial', '$PrincialAficion', '$PracticaDeporte', 
                    '$CualDeporte', '$ReconoActividades', '$CualDesempeño', '$imagen'
                );";

        $registrar = mysqli_query($conexion, $query);

        if ($registrar) {
            echo "<script>alert('Hoja de vida creada exitosamente');</script>";
            echo "<script>window.location='dashboard.php?mod=crear_hoja_as';</script>";
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
    <title>Hoja de Vida Aspirantes</title>
</head>
<body>
<style>
    .imagen-superior-derecha {
        margin-top: -7px !important;
        float: center;
        width: 150px;
        margin: 20px;
    }

    .form_gestionar {
        overflow: hidden; /* Para que los elementos floten correctamente */
    }
        :root {
            --main-color: #d6b991;
            --black: #292929;
            --bg: #131313;
            --border: .1rem solid rgba(255,255,255,.3);
        }

        .form_gestionar {
            background-color: #fff; /* Blanco */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
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
            color: #000; /* Negro */
        }

        .input, .large-input {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 103%;
            background-color: #292929;
            color: white;
        }

        .input {
            width: 100%;
        }

        .large-input {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            background: white;
            width: 103%;
        }

        .input-medium{
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 103%;
            background-color: white;
            color: white;
        }

        .input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 103%;
            background-color: white;
            color: white;
        }

        .input[type="submit"] {
            background-color: #df9239; 
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
            width: 103%;
            background-color: white;
            color: white;
        }
        .profesion{
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            background-color: white;
            color: white;
        }
</style>
<center>
    <h1 style="color: #6f2503; font-size: 40px;">Aspirantes</h1>
    <h1 style="color: #6f2503;">Hoja de vida</h1>
    <form action="dashboard.php?mod=crear_hoja_as" enctype="multipart/form-data" method="post" class="form_gestionar">

        <div class="imagen-superior-derecha">
            <h1 style="font-size:20px; color: black;">Imagen del aspirante</h1>
            <!-- Input de archivo oculto -->
            <input type="file" id="imagenInput" name="imagen" class="form-control-crear" accept="image/*" style="display: none;" required>
            
            <!-- Imagen que actuará como el selector de archivo -->
            <img src="uploads/default.png" id="imagenVista" alt="Selecciona una imagen" style="width: 100px; height: 100px; margin-top: 10px; cursor: pointer; border-radius: 5px;">
        </div>

        <table>
            <!-- Información Personal -->
            <tr>
                <th>Apellidos</th>
                <td><input style="color:black;" class="input-medium" type="text" name="apellidos" placeholder="Apellidos" required></td>
                <th>Nombre</th>
                <td><input style="color:black;" class="input-medium" type="text" name="nombre" placeholder="Nombre" required></td>
            </tr>
            <tr>
                <th>Fecha de nacimiento</th>
                <td><input style="color:black;" class="input-medium" type="date" name="nacimiento" required></td>
                <th>Lugar de nacimiento</th>
                <td colspan="2">
                    <select style="color:black;" name="LugarNacimiento" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Medellin">Medellin</option>
                        <option value="Cali">Cali</option>
                        <option value="Bogota">Bogota</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td><input style="color:black;" class="input-medium" type="text" name="direccion" placeholder="Domicilio" required></td>
                <th>Ciudad donde vive</th>
                <td>
                    <select style="color:black;" name="Viviendo" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Medellin">Medellin</option>
                        <option value="Cali">Cali</option>
                        <option value="Bogota">Bogota</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td><input style="color:black;" class="input-medium" type="number" name="telefono" placeholder="Teléfono" required></td>
                <th>Celular</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="number" name="celular" placeholder="Celular" required></td>
            </tr>
            <tr>
                <th>Correo</th>
                <td><input style="color:black;" class="input-medium" type="email" name="correo" placeholder="Correo" required></td>
                <th>Nacionalidad</th>
                <td>
                    <select style="color:black;" name="nacionalidad" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Colombiana">Colombiana</option>
                        <option value="Venezolana">Venezolana</option>
                        <option value="Otra">Otra</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Profesión</th>
                <td colspan="3"><input style="color:black;" class="profesion" type="text" name="profesion" placeholder="Profesión" required></td> 
            </tr>
            <tr>
                <th>Estado civil</th>
                <td>
                    <select style="color:black;"  name="estado_civil" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                    </select>
                </td>
                <th>Años de experiencia</th>
                <td><input class="input-medium" style="color:black;" type="number" name="TiExperiencia" placeholder="Años de experiencia" required></td>
            </tr>
            <tr>
                <th>Tipo de documento</th>
                <td>
                    <select style="color:black;" name="TipoDoc" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="TI">TI</option>
                        <option value="CC">CC</option>
                        <option value="PPT">PPT</option>
                    </select>
                </td>
                <th>Número de documento</th>
                <td><input class="input-medium" style="color:black;" type="number" name="NumeroDoc" placeholder="Número de documento" required></td>
            </tr>
            <tr>
                <th>Fecha de expedición</th>
                <td><input class="input-medium" style="color:black;" type="date" name="expedicion" required></td>
                <th>Tiene vehículo?</th>
                <td>
                    <select style="color:black;" name="vehiculo" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Licencia de conducir</th>
                <td>
                    <select style="color:black;" name="licenciaC" style="color:black;" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>Categoría</th>
                <td><input class="input-medium" style="color:black;" type="text" name="categoria" placeholder="Categoría" required></td>
            </tr>
            <tr>
                <th>Perfil laboral</th>
                <td colspan="3"><textarea style="color:black;" class="profesion" name="perfil_laboral" placeholder="Perfil laboral" required></textarea></td>
            </tr>
            <tr>
                <th>Trabaja actualmente?</th>
                <td>
                    <select style="color:black;" name="trabajaAc" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>En cuál empresa?</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="text" name="empresa" placeholder="En cuál empresa?" required></td>
            </tr>
            <tr>
                <th>Empleado o independiente?</th>
                <td>
                    <select style="color:black;" name="EmIn" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Empleado">Empleado</option>
                        <option value="Independiente">Independiente</option>
                    </select>
                </td>
                <th>Tipo de contrato</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="text" name="tipo_contrato" placeholder="Tipo de contrato" required></td>
            </tr>
            <tr>
                <th>En qué trabajó antes?</th>
                <td colspan="3"><textarea style="color:black;" class="profesion" name="trabajo_antes" placeholder="En qué trabajó antes?" required></textarea></td>
            </tr>
            <tr>
                <th>Antes solicitó trabajo aquí?</th>
                <td>
                    <select style="color:black;" name="saliantes" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>Fecha en que solicitó trabajo aquí</th>
                <td><input style="color:black;" class="input-medium" type="date" name="fecha_solicitud" required></td>
            </tr>

            <!-- Información de Referencias y Otras -->
            <tr>
                <th>Conoce algún integrante de la empresa?</th>
                <td>
                    <select style="color:black;" name="conocido" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>Nombre del conocido</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="text" name="nombreCo" placeholder="Nombre del conocido" required></td>
            </tr>
            <tr>
                <th>Tiene o ha tenido parientes aquí?</th>
                <td>
                    <select style="color:black;" name="parientes" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>Nombre del pariente</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="text" name="nombrePa" placeholder="Nombre del pariente" required></td>
            </tr>
            <tr>
                <th>¿Cómo conoció nuestra vacante?</th>
                <td>
                    <select style="color:black;" name="vacante" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Anuncios">Anuncios</option>
                        <option value="Amigos">Amigos</option>
                        <option value="Redes sociales">Redes sociales</option>
                        <option value="Otros">Otros</option>
                    </select>
                </td>
                <th>¿Trabajo en otro lugar antes?</th>
                <td>
                    <select style="color:black;" name="OtroLugar" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Vive en casa:</th>
                <td>
                    <select style="color:black;" name="casa" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Propia">Propia</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Alquilada">Alquilada</option>
                    </select>
                </td>
                <th>Nombre del arrendador</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="text" name="nombreArre" placeholder="Nombre del arrendador" required></td>
            </tr>
            <tr>
                <th>Teléfono del arrendador</th>
                <td><input class="input-medium" style="color:black;" type="number" name="TeleArre" placeholder="Teléfono del arrendador" required></td>
                <th>Tiempo en la residencia</th>
                <td><input class="input-medium" style="color:black;" type="number" name="tiempoR" placeholder="Tiempo en la residencia" required></td>
            </tr>
            <tr>
                <th>¿Tiene ingresos adicionales?</th>
                <td>
                    <select style="color:black;" name="ingresoA" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>Cantidad</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="number" name="cantidad" placeholder="Cantidad" required></td>
            </tr>
            <tr>
                <th>Obligaciones económicas mensuales</th>
                <td colspan="3"><textarea style="color:black;" class="profesion" name="obligaciones" placeholder="Obligaciones económicas mensuales" required></textarea></td>
            </tr>
            <tr>
                <th>¿Por qué conceptos?</th>
                <td colspan="3"><textarea style="color:black;" class="profesion" name="conceptos" placeholder="¿Por qué conceptos?" required></textarea></td>
            </tr>
            <tr>
                <th>¿Cuánto es su aspiración salarial?</th>
                <td><input style="color:black;" class="input-medium" type="number" name="aspiracion" placeholder="¿Cuánto?" required></td>
                <th>¿Cuál es su principal afición?</th>
                <td><input style="color:black;" class="input-medium" type="text" name="aficion" placeholder="Principal afición" required></td>
            </tr>
            <tr>
                <th>¿Practica algún deporte?</th>
                <td>
                    <select style="color:black;" name="PracDeporte" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>¿Cuál?</th>
                <td colspan="2"><input style="color:black;" class="input-medium" type="text" name="deporte" placeholder="¿Cuál?" required></td>
            </tr>
            <tr>
                <th>¿Te reconocen por tu desempeño en actividades como: académicas, deportivas, culturales, etc.?</th>
                <td>
                    <select style="color:black;" name="desempeño" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </td>
                <th>¿Cuáles?</th>
                <td>
                    <select style="color:black;" name="cualDesempeño" class="input-medium" required>
                        <option value="">Seleccionar</option>
                        <option value="Academicos">Académicos</option>
                        <option value="Deportivos">Deportivos</option>
                        <option value="Culturales">Culturales</option>
                        <option value="Otros">Otros</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="5"><input class="input" type="submit" name="Btn" value="Crear"></td>
            </tr>
        </table>
    </form>
</center>

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
</body>
</html>
