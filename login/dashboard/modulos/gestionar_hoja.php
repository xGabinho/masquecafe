<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

.imagen-superior-derecha {
        margin-top: -15px !important;
        float: center;
        width: 150px;
        margin: 20px;
    }

    .form_gestionar {
        overflow: hidden; /* Para que los elementos floten correctamente */
        box-shadow: 0px 5px 10px grey;
    }
        :root{
    --main-color: #d6b991;
    --black: #292929;
    --bg: #131313;
    --border: .1rem solid rgba(255,255,255,.3)
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
            padding: 8px;
            border: 1px solid #ccc; /* Gris claro */
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            overflow: auto;
            resize: none;
        }

        .input {
            width: 100%;
        }

        .large-input {
            width: 100%;
            max-width: 100%; /* Asegura que el ancho no exceda el contenedor */
            height: 100px; /* Ajusta la altura según sea necesario */
            min-width: 200px; /* Ancho mínimo para los campos grandes */
        }

        .input[type="file"] {
            padding: 5px;
        }

        .input[type="submit"] {
            background-color: #d6b991; 
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
    </style>
</head>  
<body>
<center>
<h1 style="color:#6f2503;">Gestión de trabajadores</h1>
<div class="d-flex justify-content-center">
    <form action="dashboard.php?mod=gestionar_hoja" method="post" class="form-inline">
        <div class="input-group">
            <input style="box-shadow: 0px 2px 10px grey;" name="buscar" type="text" class="form-control bg-light border-0 small" placeholder="Nombre" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button style=" color:black;box-shadow: 0px 2px 10px grey; background:#df9239;" class="btn" name="btn_search" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<br><br>


    <?php
    if(isset($_POST['btn_eliminar'])){
        include 'conexion.php';
        $dato_eliminar = $_POST['dato_eliminar'];
        
        // Get the image path before deletion
        $query_img = mysqli_query($conexion, "SELECT imagen FROM hojadevidapersonal WHERE identificacion='$dato_eliminar'");
        $img_data = mysqli_fetch_assoc($query_img);
        $img_path = $img_data['imagen'];

        // Delete the product from the database
        $eliminar = mysqli_query($conexion,"DELETE FROM hojadevidapersonal WHERE identificacion = '$dato_eliminar'");

        // Delete the image file if it exists
        if (file_exists($img_path)) {
            unlink($img_path);
        }

        echo "<script>alert('Hoja de vida eliminada con éxito');</script>";
        echo "<script>window.location='dashboard.php?mod=gestionar_hoja';</script>";
    }

    if(isset($_POST['BtnActualizar'])){
        include "conexion.php";
        $presentacion = $_POST['presentacion'];
        $nombre = $_POST['nombre'];
        $TipoDoc = $_POST['TipoDoc'];
        $Numerodoc = $_POST['NumeroDoc'];
        $nacimiento = $_POST['FechaNacimiento'];
        $domicilio = $_POST['domicilio'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $correo = $_POST['email'];
        $estudios = $_POST['estudios'];
        $segundarios = $_POST['segundarios'];
        $universitarios = $_POST['universitarios'];
        $posgrado = $_POST['posgrados'];
        $experiencia = $_POST['experiencia'];
        $ReferenciaLaboral = $_POST['ReferenciaLaboral'];
        $ReferenciasPersonales = $_POST['ReferenciasPersonales'];



        // Handle image update
        $img_file = $_FILES['imagen']['name'];
        $img_temp = $_FILES['imagen']['tmp_name'];
        $upload_dir = "uploads/";
        $img_path = $upload_dir . basename($img_file);
    
        if (!empty($img_file)) {
            move_uploaded_file($img_temp, $img_path);

        $modificar = mysqli_query($conexion, "UPDATE `hojadevidapersonal` 
        SET `presentacion` = '$presentacion', 
            `nombre` = '$nombre', 
            `TipoDocumento` = '$TipoDoc', 
            `identificacion` = '$Numerodoc', 
            `FechaNacimiento` = '$nacimiento', 
            `domicilio` = '$domicilio', 
            `telefono` = '$telefono', 
            `celular` = '$celular', 
            `correo` = '$correo', 
            `estudios` = '$estudios', 
            `segundarios` = '$segundarios', 
            `universitarios` = '$universitarios', 
            `posgrados` = '$posgrado', 
            `experiencia` = '$experiencia', 
            `ReferenciaLaboral` = '$ReferenciaLaboral', 
            `ReferenciasPersonales` = '$ReferenciasPersonales', 
            `imagen` = '$img_path' 
        WHERE `identificacion` = '$Numerodoc';");
        
    } else {
        // Update without image if no image is uploaded
        $modificar = mysqli_query($conexion, "UPDATE `hojadevidapersonal` 
        SET `presentacion` = '$presentacion', 
            `nombre` = '$nombre', 
            `TipoDocumento` = '$TipoDoc', 
            `identificacion` = '$Numerodoc', 
            `FechaNacimiento` = '$nacimiento', 
            `domicilio` = '$domicilio', 
            `telefono` = '$telefono', 
            `celular` = '$celular', 
            `correo` = '$correo', 
            `estudios` = '$estudios', 
            `segundarios` = '$segundarios', 
            `universitarios` = '$universitarios', 
            `posgrados` = '$posgrado', 
            `experiencia` = '$experiencia', 
            `ReferenciaLaboral` = '$ReferenciaLaboral', 
            `ReferenciasPersonales` = '$ReferenciasPersonales'
        WHERE `identificacion` = '$Numerodoc';");
    }

        echo "<script>alert('Hoja de vida actualizada con éxito');</script>";
        echo "<script>window.location='dashboard.php?mod=gestionar_hoja';</script>";
    }

    if(isset($_POST['btn_search'])){
        include 'conexion.php';
        $dato = $_POST['buscar'];
        ?>
        <div style="box-shadow: 0px 5px 10px grey; border:none;border-radius: 20px;" class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Trabajadores</h6>
            </div>
            <div style=" border-radius:10px;box-shadow: 0px 5px 10px grey;" class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr style="color: #6f2503; font-weight:bold;">
                            <td>NOMBRE</td>
                            <td>IDENTIFICACIÓN</td>
                            <td>TELEFONO</td>
                            <td>CORREO</td>
                            <td>HOJA DE VIDA</td>
                            <td>ELIMINAR HOJA DE VIDA</td>
                        </tr>
                        <?php
                        $consulta = mysqli_query($conexion,"SELECT * FROM hojadevidapersonal WHERE nombre LIKE '%$dato%';") or die ($conexion."Error en la consulta");

                        while($arreglo=mysqli_fetch_array($consulta)){
                        ?>
                        <tr style="color: #6f2503;">
                            <td><?php echo $arreglo['nombre'];?></td>
                            <td><?php echo $arreglo['identificacion'];?></td>
                            <td><?php echo $arreglo['telefono'];?></td>
                            <td><?php echo $arreglo['correo'];?></td>
                            <td>
                                <center>
                                    <form action="dashboard.php?mod=gestionar_hoja#modificar" method="post">
                                        <input type="text" name="dato_modificar" value="<?php echo $arreglo['identificacion'];?>" hidden>
                                        <button type="submit" name="btn_modificar" class="btn_modificar">
                                            <i style="color: black; font-size: 20px;" class='bx bx-copy-alt'></i>
                                        </button>
                                    </form>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <form action="dashboard.php?mod=gestionar_hoja#modificar" method="post">
                                        <input type="text" name="dato_eliminar" value="<?php echo $arreglo['identificacion'];?>" hidden>
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

    if(isset($_POST['btn_modificar'])){
        include 'conexion.php';
        $dato_modificar = $_POST['dato_modificar'];

        $consulta = mysqli_query($conexion, "SELECT * FROM `hojadevidapersonal` WHERE `identificacion` = '$dato_modificar';") or die ($conexion."Error en la consulta");
        $arreglo = mysqli_fetch_array($consulta);
        ?>

<h1 style="color: #6f2503;">Modificar Hoja de Vida</h1>
<h1 style="color: #6f2503;"><?php echo $arreglo['nombre'];?></h1>
<form action="dashboard.php?mod=gestionar_hoja" method="post" enctype="multipart/form-data" class="form_gestionar">

    <!-- Contenedor para la imagen en la parte superior derecha -->
    <div class="imagen-superior-derecha">
        <!-- Input de archivo oculto -->
        <input type="file" id="imagenInput" name="imagen" class="form-control-crear" accept="image/*" style="display: none;">
        
        <!-- Imagen que actuará como el selector de archivo -->
        <img src="<?php echo $arreglo['imagen'];?>" id="imagenVista" alt="Imagen actual" style="width: 100px; height: 100px; margin-top: 10px; cursor: pointer;">
    </div>

    <table>
        <tr>
            <th>Carta de presentación</th>
            <td colspan="4"><textarea class="large-input" name="presentacion"><?php echo $arreglo['presentacion'];?></textarea></td>
        </tr>
        <tr>
            <th>Nombre completo</th>
            <td colspan="2"><input class="input" type="text" name="nombre" value="<?php echo $arreglo['nombre'];?>"></td>
            <th>Tipo de documento</th>
            <td><input class="input" type="text" name="TipoDoc" value="<?php echo $arreglo['TipoDocumento'];?>" readonly></td>
        </tr>
        <tr>
            <th>Número de documento</th>
            <td colspan="4"><input class="input" type="number" name="NumeroDoc" value="<?php echo $arreglo['identificacion'];?>" readonly></td>
        </tr>
        <tr>
            <th>Fecha de nacimiento</th>
            <td><input class="input" type="date" name="FechaNacimiento" value="<?php echo $arreglo['FechaNacimiento'];?>"></td>
            <th>Domicilio</th>
            <td colspan="2"><input class="input" type="text" name="domicilio" value="<?php echo $arreglo['domicilio'];?>"></td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td><input class="input" type="number" name="telefono" value="<?php echo $arreglo['telefono'];?>"></td>
            <th>Celular</th>
            <td colspan="2"><input class="input" type="number" name="celular" value="<?php echo $arreglo['celular'];?>"></td>
        </tr>
        <tr>
            <th>Correo</th>
            <td colspan="4"><input class="input" type="email" name="email" value="<?php echo $arreglo['correo'];?>"></td>
        </tr>
        <tr>
            <th>Estudios</th>
            <td><textarea class="large-input" name="estudios"><?php echo $arreglo['estudios'];?></textarea></td>
            <th>Segundarios</th>
            <td colspan="2"><textarea class="large-input" name="segundarios"><?php echo $arreglo['segundarios'];?></textarea></td>
        </tr>
        <tr>
            <th>Universitarios</th>
            <td><textarea class="large-input" name="universitarios"><?php echo $arreglo['universitarios'];?></textarea></td>
            <th>Posgrados</th>
            <td colspan="2"><textarea class="large-input" name="posgrados"><?php echo $arreglo['posgrados'];?></textarea></td>
        </tr>
        <tr>
            <th>Experiencia</th>
            <td colspan="4"><textarea class="large-input" name="experiencia"><?php echo $arreglo['experiencia'];?></textarea></td>
        </tr>
        <tr>
            <th>Referencia laboral</th>
            <td colspan="4"><textarea class="large-input" name="ReferenciaLaboral"><?php echo $arreglo['ReferenciaLaboral'];?></textarea></td>
        </tr>
        <tr>
            <th>Referencias personales</th>
            <td colspan="4"><textarea class="large-input" name="ReferenciasPersonales"><?php echo $arreglo['ReferenciasPersonales'];?></textarea></td>
        </tr>
        <tr>
            <td colspan="5"><input style="background:#df9239;" class="input" type="submit" name="BtnActualizar" value="Actualizar"></td>
        </tr>
    </table>
</form>

<!-- Estilos CSS para posicionar la imagen -->

<!-- Script para hacer que al hacer clic en la imagen se abra el selector de archivos -->
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


<!-- Estilos CSS para posicionar la imagen -->

    <?php
    }
    ?>
</center>
</body>
</html>
