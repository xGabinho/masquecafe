<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>

    
.imagen-superior-derecha {
        margin-top: -15px !important;
        float: center;
        width: 150px;
        margin: 20px;
    }

    .form_gestionar {
        overflow: hidden; /* Para que los elementos floten correctamente */
    }
        :root{
    --main-color: #d6b991;
    --black: #292929;
    --bg: #131313;
    --border: .1rem solid rgba(255,255,255,.3)
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
        }

        .input {
            width: 100%;
        }

        .large-input {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 103%;
        }

        .input-medium{
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 103%;
        }

        .input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 103%;
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
        }

        .input[type="submit"]:hover {
            background-color: none;
        }
		select {
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 103%;
        }
        .profesion{
            padding: 10px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
    </style>

<center>
    <h1 style="color:#6f2503; font-weight:bold;">Gestión de aspirantes</h1>
<form action="dashboard.php?mod=gestionar_hoja_as" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
        <input style="box-shadow: 0px 2px 10px grey;" name="buscar" type="text" class="form-control bg-light border-0 small" placeholder="Nombre"
        aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <button  style="color:black;background: #df9239; box-shadow: 0px 2px 10px grey;" class="btn"  name="btn_search" type="submit">
        <i class="fas fa-search fa-sm"></i>
        </button>
        </div>
        </div>
</form>
<br><br>
<?php
    if(isset($_POST['btn_eliminar'])){
        include 'conexion.php';
        $dato_eliminar = $_POST['dato_eliminar'];
        
        // Get the image path before deletion
        $query_img = mysqli_query($conexion, "SELECT imagen FROM hojadevidaaspirante WHERE numero_documento='$dato_eliminar'");
        $img_data = mysqli_fetch_assoc($query_img);
        $img_path = $img_data['imagen'];

        // Delete the product from the database
        $eliminar = mysqli_query($conexion,"DELETE FROM hojadevidaaspirante WHERE numero_documento = '$dato_eliminar'");

        // Delete the image file if it exists
        if (file_exists($img_path)) {
            unlink($img_path);
        }

        echo "<script>alert('Hoja de vida eliminada con éxito');</script>";
        echo "<script>window.location='dashboard.php?mod=gestionar_hoja_as';</script>";
    }
if(isset($_POST['BtnActualizar'])){
    include "conexion.php";
    $apellidos = $_POST['apellidos'];
    $nombre = $_POST['nombre'];
    $nacimiento = $_POST['nacimiento'];
    $LugarNacimiento = $_POST['LugarNacimiento'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['Viviendo'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $nacionalidad = $_POST['nacionalidad'];
    $profesion = $_POST['profesion'];
    $EstadoCivil = $_POST['estado_civil'];
    $TiExperiencia = $_POST['TiExperiencia'];
    $TipoDoc = $_POST['TipoDoc'];
    $NumeroDoc = $_POST['NumeroDoc'];
    $expedicion = $_POST['expedicion'];
    $vehiculo = $_POST['vehiculo'];
    $licencia = $_POST['licenciaC'];
    $categoria = $_POST['categoria'];
    $PerfilLaboral = $_POST['perfil_laboral'];
    $TraActualmente = $_POST['trabajaAc'];
    $empresa = $_POST['empresa'];
    $EmIn = $_POST['EmIn'];
    $TipoContrato = $_POST['tipo_contrato'];
    $TrabajoAntes = $_POST['trabajo_antes'];
    $SolicitoAntes = $_POST['saliantes'];
    $FechaSolicitud = $_POST['fecha_solicitud'];
    $ConoceEquipo = $_POST['conocido'];
    $NombreCono = $_POST['nombreCo'];
    $ParientesAqui = $_POST['parientes'];
    $NombrePariente = $_POST['nombrePa'];
    $ConociVacante = $_POST['vacante'];
    $TrabajoLugar = $_POST['OtroLugar'];
    $ViveCasa = $_POST['casa'];
    $NombreArre = $_POST['nombreArre'];
    $TeleArre = $_POST['TeleArre'];
    $TiempoResidencia = $_POST['tiempoR'];
    $IngresoAdicional = $_POST['ingresoA'];
    $cantidad = $_POST['cantidad'];
    $ObligacionesMensuales = $_POST['obligaciones'];
    $Conceptos = $_POST['conceptos'];
    $AspiracionSalarial = $_POST['aspiracion'];
    $PrincialAficion = $_POST['aficion'];
    $PracticaDeporte = $_POST['PracDeporte'];
    $CualDeporte = $_POST['deporte'];
    $ReconoActividades = $_POST['desempeño'];
    $CualDesempeño = $_POST['cualDesempeño'];

    $img_file = $_FILES['imagen']['name'];
    $img_temp = $_FILES['imagen']['tmp_name'];
    $upload_dir = "uploads/";
    $img_path = $upload_dir . basename($img_file);

    if (!empty($img_file)) {
        move_uploaded_file($img_temp, $img_path);

    $modificar = mysqli_query($conexion,"UPDATE `hojadevidaaspirante` SET `apellidos` = '$apellidos', `nombre` = '$nombre', `nacimiento` = '$nacimiento', `lugar_nacimiento` = '$LugarNacimiento', `direccion` = '$direccion', `ciudad` = '$ciudad', `telefono` = '$telefono', `celular` = '$celular', `correo` = '$correo', `nacionalidad` = '$nacionalidad', `profesion` = '$profesion', `estado_civil` = '$EstadoCivil', `tiempo_experiencia` = '$TiExperiencia', `tipo_documento` = '$TipoDoc', `numero_documento` = '$NumeroDoc', `expedida` = '$expedicion', `vehiculo` = '$vehiculo', `licencia_conducir` = '$licencia', `categoria` = '$categoria', `perfil_laboral` = '$PerfilLaboral', `trabaja_actualmente` = '$TraActualmente', `que_empresa` = '$empresa', `empleado_independiente` = '$EmIn', `tipo_contrato` = '$TipoContrato', `trabajo_antes` = '$TrabajoAntes', `solicito_antes` = '$SolicitoAntes', `fecha` = '$FechaSolicitud', `conoce_equipo` = '$ConoceEquipo', `nombre_conocido` = '$NombreCono', `parientes_aqui` = '$ParientesAqui', `nombre_pariente` = '$NombrePariente', `conocimiento_vacante` = '$ConociVacante', `trabajar_otro_lugar` = '$TrabajoLugar', `vive_en_casa` = '$ViveCasa', `nombre_arrendador` = '$NombreArre', `telefono_arrendador` = '$TeleArre', `tiempo_residencia` = '$TiempoResidencia', `ingreso_adicional` = '$IngresoAdicional', `cantidad` = '$cantidad', `obligaciones_mensuales` = '$ObligacionesMensuales', `porque_conceptos` = '$Conceptos', `aspiracion_salarial` = '$AspiracionSalarial', `principal_aficion` = '$PrincialAficion', `practica_deporte` = '$PracticaDeporte', `cual` = '$CualDeporte', `reconocimiento_actividades` = '$ReconoActividades', `cualDeporte` = '$CualDesempeño', `imagen` = '$img_path' WHERE `hojadevidaaspirante`.`numero_documento` = '$NumeroDoc';");

} else {
    // Update without image if no image is uploaded
    $modificar = mysqli_query($conexion,"UPDATE `hojadevidaaspirante` SET `apellidos` = '$apellidos', `nombre` = '$nombre', `nacimiento` = '$nacimiento', `lugar_nacimiento` = '$LugarNacimiento', `direccion` = '$direccion', `ciudad` = '$ciudad', `telefono` = '$telefono', `celular` = '$celular', `correo` = '$correo', `nacionalidad` = '$nacionalidad', `profesion` = '$profesion', `estado_civil` = '$EstadoCivil', `tiempo_experiencia` = '$TiExperiencia', `tipo_documento` = '$TipoDoc', `numero_documento` = '$NumeroDoc', `expedida` = '$expedicion', `vehiculo` = '$vehiculo', `licencia_conducir` = '$licencia', `categoria` = '$categoria', `perfil_laboral` = '$PerfilLaboral', `trabaja_actualmente` = '$TraActualmente', `que_empresa` = '$empresa', `empleado_independiente` = '$EmIn', `tipo_contrato` = '$TipoContrato', `trabajo_antes` = '$TrabajoAntes', `solicito_antes` = '$SolicitoAntes', `fecha` = '$FechaSolicitud', `conoce_equipo` = '$ConoceEquipo', `nombre_conocido` = '$NombreCono', `parientes_aqui` = '$ParientesAqui', `nombre_pariente` = '$NombrePariente', `conocimiento_vacante` = '$ConociVacante', `trabajar_otro_lugar` = '$TrabajoLugar', `vive_en_casa` = '$ViveCasa', `nombre_arrendador` = '$NombreArre', `telefono_arrendador` = '$TeleArre', `tiempo_residencia` = '$TiempoResidencia', `ingreso_adicional` = '$IngresoAdicional', `cantidad` = '$cantidad', `obligaciones_mensuales` = '$ObligacionesMensuales', `porque_conceptos` = '$Conceptos', `aspiracion_salarial` = '$AspiracionSalarial', `principal_aficion` = '$PrincialAficion', `practica_deporte` = '$PracticaDeporte', `cual` = '$CualDeporte', `reconocimiento_actividades` = '$ReconoActividades', `cualDeporte` = '$CualDesempeño' WHERE `hojadevidaaspirante`.`numero_documento` = '$NumeroDoc';");

}

    echo "<script>alert('Hoja de vida actualizada con exito');</script>";
    echo "<script>window.location='dashboard.php?mod=gestionar_hoja_as';</script>";
}
    if(isset($_POST['btn_search'])){
        include 'conexion.php';
        $dato = $_POST['buscar'];
?>

        <div style="border-radius: 20px;" class="card shadow mb-4">
    <div  style="background-color: #6f2503;" class="card-header py-3">
        <h6  style="color:#6f2503; font-size: 20px;" class="m-0 font-weight-bold">Aspirantes</h6>
    </div>
<div style="background-color: white; border-radius: 20px;box-shadow: 0px 5px 10px grey;" class="card-body">
    <div style="background: white; color:#6f2503;" class="table-responsive">
        <table style="color: #6f2503; background-color: white;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr style="color: #6f2503; font-weight:bold;">
                <td style="color: #6f2503;">APELLIDOS</td>
                <td style="color: #6f2503;">NOMBRE</td>
                <td style="color: #6f2503;">IDENTIFICACIÓN</td>
                <td style="color: #6f2503;">TELEFONO</td>
                <td style="color: #6f2503;">CORREO</td>
                <td style="color: #6f2503;">HOJA DE VIDA</td>
                <td style="color: #6f2503;">ELIMINAR HOJA DE VIDA</td>
            </tr>
            <?php
                $consulta = mysqli_query($conexion,"SELECT * FROM hojadevidaaspirante WHERE nombre LIKE '%$dato%';") or die ($conexion."Error en la consulta");

                while($arreglo=mysqli_fetch_array($consulta)){
            ?>
            <tr>
                <td><?php echo $arreglo['apellidos'];?></td>
                <td><?php echo $arreglo['nombre'];?></td>
                <td><?php echo $arreglo['numero_documento'];?></td>
                <td><?php echo $arreglo['telefono'];?></td>
                <td><?php echo $arreglo['correo'];?></td>
                <td>
                    <center>
                        <form action="dashboard.php?mod=gestionar_hoja_as#modificar" method="post">
                            <input type="text" name="dato_modificar" value="<?php echo $arreglo['numero_documento'];?>" hidden>
                            <button type="submit" name="btn_modificar" class="btn_modificar">
                                <i style="color: black; font-size: 20px;" class='bx bx-copy-alt'></i>
                            </button>
                        </form>
                    </center>
                </td>
                <td>
                    <center>
                    <form action="dashboard.php?mod=gestionar_hoja_as#modificar" method="post">
                            <input type="text" name="dato_eliminar" value="<?php echo $arreglo['numero_documento'];?>" hidden>
                            <button type="submit" name="btn_eliminar" class="btn_modificar">
                                <i style="color: black; font-size: 20px;" class='bx bx-folder-minus'></i>
                            </button>
                        </form>
                    </center>
                </td>

            </tr>

            <?php
            }
            ?>
            
        </table>
        </div>
    </div>
</div>

<?php
}
?>

<i id="modificar"></i><br>
<?php
    if(isset($_POST['btn_modificar'])){ 
        include 'conexion.php'; 
        $datom = $_POST['dato_modificar'];
        $consultam = mysqli_query($conexion, "SELECT * FROM hojadevidaaspirante WHERE numero_documento = '$datom';") or die($conexion."error");

        while($arreglom = mysqli_fetch_array($consultam)){

?>
<h1 style="color:#6f2503;">Hoja de vida de</h1>
<h1 style="color:#6f2503;"><?php echo $arreglom['nombre']," ", $arreglom['apellidos']?></h1>

<body>
<form action="dashboard.php?mod=gestionar_hoja_as" enctype="multipart/form-data" method="post" class="form_gestionar">


        <div class="imagen-superior-derecha">
        <!-- Input de archivo oculto -->
        <input type="file" id="imagenInput" name="imagen" class="form-control-crear" accept="image/*" style="display: none;">
        
        <!-- Imagen que actuará como el selector de archivo -->
        <img src="<?php echo $arreglom['imagen'];?>" id="imagenVista" alt="Imagen actual" style="width: 100px; height: 100px; margin-top: 10px; cursor: pointer;">
        </div>
        
        <table>
            <!-- Información Personal -->
            <tr>
                <th>Apellidos</th>
                <td><input class="input-medium" type="text" name="apellidos" value="<?php echo $arreglom['apellidos'];?>"></td>
                <th>Nombre</th>
                <td><input class="input-medium" type="text" name="nombre" value="<?php echo $arreglom['nombre'];?>"></td>
            </tr>
            <tr>
                <th>Fecha de nacimiento</th>
                <td><input class="input-medium" type="date" name="nacimiento" value="<?php echo $arreglom['nacimiento'];?>"></td>
                <th>Lugar de nacimiento</th>
                <td colspan="2"><select name="LugarNacimiento" class="input-small">
                        <option value="Medellin" <?php if ($arreglom['lugar_nacimiento'] == 'Medellin') echo 'selected'; ?>>Medellin</option>
                        <option value="Cali" <?php if ($arreglom['lugar_nacimiento'] == 'Cali') echo 'selected'; ?>>Cali</option>
                        <option value="Bogota" <?php if ($arreglom['lugar_nacimiento'] == 'Bogota') echo 'selected'; ?>>Bogota</option>
               </select></td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td><input class="input-medium" type="text" name="direccion" value="<?php echo $arreglom['direccion'];?>"></td>
                <th>Ciudad donde vive</th>
                <td><select name="Viviendo" class="input-medium">
                        <option value="Medellin" <?php if ($arreglom['ciudad'] == 'Medellin') echo 'selected'; ?>>Medellin</option>
                        <option value="Cali" <?php if ($arreglom['ciudad'] == 'Cali') echo 'selected'; ?>>Cali</option>
                        <option value="Bogota" <?php if ($arreglom['ciudad'] == 'Bogota') echo 'selected'; ?>>Bogota</option>
                </select></td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td><input class="input-medium" type="number" name="telefono" value="<?php echo $arreglom['telefono'];?>"></td>
                <th>Celular</th>
                <td colspan="2"><input class="input-medium" type="number" name="celular" value="<?php echo $arreglom['celular'];?>"></td>
            </tr>
            <tr>
                <th>Correo</th>
                <td><input class="input-medium" type="email" name="correo" value="<?php echo $arreglom['correo'];?>"></td>
                <th>Nacionalidad</th>
                <td><select name="nacionalidad" class="input-medium">
                        <option value="Colombiana" <?php if ($arreglom['nacionalidad'] == 'Medellin') echo 'selected'; ?>>Colombiana</option>
                        <option value="Venezolana" <?php if ($arreglom['nacionalidad'] == 'Cali') echo 'selected'; ?>>Venezolana</option>
                        <option value="Otra" <?php if ($arreglom['nacionalidad'] == 'Bogota') echo 'selected'; ?>>Otra</option>
                </select></td>
            </tr>
            <tr>
                <th>Profesión</th>
                <td  colspan="3"><input class="profesion" type="text" name="profesion" value="<?php echo $arreglom['profesion'];?>"></td> 
            </tr>
            <tr>
                <th>Estado civil</th>
                <td><select name="estado_civil" class="input-medium">
                        <option value="Soltero" <?php if ($arreglom['estado_civil'] == 'Soltero') echo 'selected'; ?>>Soltero</option>
                        <option value="Casado" <?php if ($arreglom['estado_civil'] == 'Casado') echo 'selected'; ?>>Casado</option>
                </select></td>
                <th>Años de experiencia</th>
                <td><input class="input-medium" type="number" name="TiExperiencia" value="<?php echo $arreglom['tiempo_experiencia'];?>"></td>
            </tr>
            <tr>
                <th>Tipo de documento</th>
                <td><select name="TipoDoc" class="input-medium">
                <option value="CC" <?php if ($arreglom['tipo_documento'] == 'CC') echo 'selected'; ?>>CC</option>
                <option value="TI" <?php if ($arreglom['tipo_documento'] == 'TI') echo 'selected'; ?>>TI</option>
                <option value="PPT" <?php if ($arreglom['tipo_documento'] == 'PPT') echo 'selected'; ?>>PPT</option>
                </select></td>
                <th>Número de documento</th>
                <td><input class="input-medium" type="number" name="NumeroDoc" value="<?php echo $arreglom['numero_documento'];?>"></td>
            </tr>
            <tr>
                <th>Fecha de expedición</th>
                <td><input class="input-medium" type="date" name="expedicion" value="<?php echo $arreglom['expedida'];?>"></td>
                <th>Tiene vehículo?</th>
                <td><select name="vehiculo" class="input-small">
                <option value="SI" <?php if ($arreglom['vehiculo'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['vehiculo'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
            </tr>
            <tr>
                <th>Licencia de conducir</th>
                <td><select name="licenciaC" class="input-medium">
                <option value="SI" <?php if ($arreglom['licencia_conducir'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['vehiculo'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>Categoría</th>
                <td><input class="input-medium" type="text" name="categoria" value="<?php echo $arreglom['categoria'];?>"></td>
            </tr>
            <tr>
                <th>Perfil laboral</th>
                <td colspan="3"><textarea class="profesion" name="perfil_laboral"><?php echo $arreglom['perfil_laboral'];?></textarea></td>
            </tr>
            <tr>
                <th>Trabaja actualmente?</th>
                <td><select name="trabajaAc" class="input-small">
                <option value="SI" <?php if ($arreglom['trabaja_actualmente'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['trabaja_actualmente'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>En cuál empresa?</th>
                <td colspan="2"><input class="input-medium" type="text" name="empresa" value="<?php echo $arreglom['que_empresa'];?>"></td>
            </tr>
            <tr>
                <th>Empleado o independiente?</th>
                <td><select name="EmIn" class="input-medium">
                <option value="Empleado" <?php if ($arreglom['empleado_independiente'] == 'Empleado') echo 'selected'; ?>>Empleado</option>
                <option value="Independiente" <?php if ($arreglom['empleado_independiente'] == 'Independiente') echo 'selected'; ?>>IndependienteNO</option>
                </select></td>
                <th>Tipo de contrato</th>
                <td colspan="2"><input class="input-medium" type="text" name="tipo_contrato" value="<?php echo $arreglom['tipo_contrato'];?>"></td>
            </tr>
            <tr>
                <th>En qué trabajó antes?</th>
                <td colspan="3"><textarea class="profesion" name="trabajo_antes"><?php echo $arreglom['trabajo_antes'];?></textarea></td>
            </tr>
            <tr>
                <th>Antes solicitó trabajo aquí?</th>
                <td><select name="saliantes" class="input-small">
                <option value="SI" <?php if ($arreglom['solicito_antes'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['solicito_antes'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>Fecha en que solicitó trabajo aquí</th>
                <td><input class="input-medium" type="date" name="fecha_solicitud" value="<?php echo $arreglom['fecha'];?>"></td>
            </tr>

            <!-- Información de Referencias y Otras -->
            <tr>
                <th>Conoce algún integrante de la empresa?</th>
                <td><select name="conocido" class="input-small">
                <option value="SI" <?php if ($arreglom['conoce_equipo'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['conoce_equipo'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>Nombre del conocido</th>
                <td colspan="2"><input class="input-medium" type="text" name="nombreCo" value="<?php echo $arreglom['nombre_conocido'];?>"></td>
            </tr>
            <tr>
                <th>Tiene o ha tenido parientes aquí?</th>
                <td><select name="parientes" class="input-small">
                <option value="SI" <?php if ($arreglom['parientes_aqui'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['parientes_aqui'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>Nombre del pariente</th>
                <td colspan="4"><textarea class="large-input" name="nombrePa"><?php echo $arreglom['nombre_pariente'];?></textarea></td>
            </tr>
            <tr>
                <th>¿Cómo conoció nuestra vacante?</th>
                <td><select name="vacante" class="input-small">
                <option value="Anuncios" <?php if ($arreglom['conocimiento_vacante'] == 'Anuncios') echo 'selected'; ?>>Anuncios</option>
                <option value="Amigos" <?php if ($arreglom['conocimiento_vacante'] == 'Amigos') echo 'selected'; ?>>Amigos</option>
                <option value="Redes sociales" <?php if ($arreglom['conocimiento_vacante'] == 'Redes sociales') echo 'selected'; ?>>Redes sociales</option>
                <option value="Otros" <?php if ($arreglom['conocimiento_vacante'] == 'Otros') echo 'selected'; ?>>Otros</option>
                </select></td>
                <th>¿Trabajo en otro lugar antes?</th>
                <td><select name="OtroLugar" class="input-small">
                <option value="SI" <?php if ($arreglom['trabajar_otro_lugar'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['trabajar_otro_lugar'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
            </tr>
            <tr>
                <th>Vive en casa:</th>
                <td><select name="casa" class="input-small">
                <option value="Propia" <?php if ($arreglom['vive_en_casa'] == 'Propia') echo 'selected'; ?>>Propia</option>
                <option value="Familiar" <?php if ($arreglom['vive_en_casa'] == 'Familiar') echo 'selected'; ?>>Familiar</option>
                <option value="Alquilada" <?php if ($arreglom['vive_en_casa'] == 'Alquilada') echo 'selected'; ?>>Alquilada</option>
                </select></td>
                <th>Nombre del arrendador</th>
                <td colspan="4"><textarea class="large-input" name="nombreArre"><?php echo $arreglom['nombre_arrendador'];?></textarea></td>
            </tr>
            <tr>
                <th>Teléfono del arrendador</th>
                <td><input class="input-medium" type="number" name="TeleArre" value="<?php echo $arreglom['telefono_arrendador'];?>"></td>
                <th>Tiempo en la residencia</th>
                <td><input class="input-medium" type="number" name="tiempoR" value="<?php echo $arreglom['tiempo_residencia'];?>"></td>
            </tr>
            <tr>
                <th>¿Tiene ingresos adicionales?</th>
                <td><select name="ingresoA" class="input-small">
                <option value="SI" <?php if ($arreglom['ingreso_adicional'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['ingreso_adicional'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>Cantidad</th>
                <td colspan="4"><input class="input-medium" type="number" name="cantidad" value="<?php echo $arreglom['cantidad'];?>"></td>
            </tr>
            <tr>
                <th>Obligaciones económicas mensuales</th>
                <td colspan="3"><textarea class="profesion" name="obligaciones"><?php echo $arreglom['obligaciones_mensuales'];?></textarea></td>
            </tr>
            <tr>
                <th>¿Por qué conceptos?</th>
                <td colspan="3"><textarea class="profesion" name="conceptos"><?php echo $arreglom['porque_conceptos'];?></textarea></td>
            </tr>
            <tr>
                <th>¿Cuánto es su aspiración salarial?</th>
                <td><input class="input-medium" type="number" name="aspiracion" value="<?php echo $arreglom['aspiracion_salarial'];?>"></td>
                <th>¿Cuál es su principal afición?</th>
                <td><input class="input-medium" type="text" name="aficion" value="<?php echo $arreglom['principal_aficion'];?>"></td>
            </tr>
            <tr>
                <th>¿Practica algún deporte?</th>
                <td><select name="PracDeporte" class="input-small">
                <option value="SI" <?php if ($arreglom['practica_deporte'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['practica_deporte'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>¿Cuál?</th>
                <td colspan="4"><input class="input-medium" type="text" name="deporte" value="<?php echo $arreglom['cual'];?>"></td>
            </tr>
            <tr>
                <th>¿Te reconocen por tu desempeño en actividades como: académicas, deportivas, culturales, etc.?</th>
                <td><select name="desempeño" class="input-small">
                <option value="SI" <?php if ($arreglom['reconocimiento_actividades'] == 'SI') echo 'selected'; ?>>SI</option>
                <option value="NO" <?php if ($arreglom['reconocimiento_actividades'] == 'NO') echo 'selected'; ?>>NO</option>
                </select></td>
                <th>¿Cuáles?</th>
                <td><select name="cualDesempeño" class="input-small">
                <option value="Academicos" <?php if ($arreglom['cualDeporte'] == 'Academicos') echo 'selected'; ?>>Academicos</option>
                <option value="Deportivos" <?php if ($arreglom['cualDeporte'] == 'Deportivos') echo 'selected'; ?>>Deportivos</option>
                <option value="Culturales" <?php if ($arreglom['cualDeporte'] == 'Culturales') echo 'selected'; ?>>Culturales</option>
                <option value="Otros" <?php if ($arreglom['cualDeporte'] == 'Otros') echo 'selected'; ?>>Otros</option>
                </select></td>
            </tr>
            <tr>
                <td colspan="5"><input class="input" type="submit" name="BtnActualizar" value="Actualizar"></td>
            </tr>
        </table>
    </form>
<?php
    }
} 
?>

<script>
    // Captura el clic en la imagen y simula el clic en el input file
    document.getElementById('imagenVista').addEventListener('click', function() {
        document.getElementById('imagenInput').click();
    });

    // Actualiza la vista previa de la imagen cuando se selecciona un nuevo archivo
    document.getElementById('imagenInput').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagenVista').src = e.target.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

</center>
</body>
</html>