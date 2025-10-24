<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <h1 style="font-weight: bold; color: #6f2503;">Gestión De Usuarios</h1>
<form action="dashboard.php?mod=gestionar" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
        <input style="box-shadow: 0px 2px 10px grey;" name="buscar" type="text" class="form-control bg-light border-0 small" placeholder="Nombre"
        aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <button style="background: #df9239; color:black; box-shadow: 0px 2px 10px grey;" class="btn"  name="btn_search" type="submit">
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
    $eliminar = mysqli_query($conexion,"DELETE FROM `clientes` WHERE `correo` = '$dato_eliminar';");
    
    echo "<script>alert('Dato eliminado con eso');</script>";
    echo "<script>window.location='dashboard.php?mod=gestionar';</script>";
}
if(isset($_POST['BtnActualizar'])){
    include 'conexion.php';
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $nacimiento = $_POST['nacimiento'];
    $rol = $_POST['rol'];
    $ciudad = $_POST['ciudad'];
    $genero = $_POST['genero'];
    $correo = $_POST['correo'];

    $modificar = mysqli_query($conexion,"UPDATE `clientes` SET `nombre` = '$nombre', `apellidos` = '$apellidos', `nacimiento` = '$nacimiento', `rol` = '$rol', `ciudad` = '$ciudad', `genero` = '$genero', `correo` = '$correo' WHERE `clientes`.`correo` = '$correo';");

    echo "<script>alert('Actualizacion Exitosa');</script>";
    echo "<script>window.location='dashboard.php?mod=gestionar';</script>";
}
    if(isset($_POST['btn_search'])){
        include 'conexion.php';
        $dato = $_POST['buscar'];
?>

        <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 style="color: #6f2503;" class="m-0 font-weight-bold text-primary">Usuarios</h6>
    </div>
<div style="box-shadow: 0px 5px 10px grey;" class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr style="color: #6f2503; font-weight: bold;">
                <td style="color: #6f2503;">Nombres</td>
                <td style="color: #6f2503;">Apellidos</td>
                <td style="color: #6f2503;">Fecha de nacimiento</td>
                <td style="color: #6f2503;">Rol</td>    
                <td style="color: #6f2503;">Ciudad de nacimiento</td>
                <td style="color: #6f2503;">Genero</td>
                <td style="color: #6f2503;">Correo</td>
                <td style="color: #6f2503;">Modificar</td>
                <td style="color: #6f2503;">Eliminar</td>
            </tr>
            <?php
                $consulta = mysqli_query($conexion,"SELECT * FROM clientes WHERE nombre LIKE '%$dato%';") or die ($conexion."Error en la consulta");

                while($arreglo=mysqli_fetch_array($consulta)){
            ?>
            <tr style="color: #6f2503;">
                <td><?php echo $arreglo['nombre'];?></td>
                <td><?php echo $arreglo['apellidos'];?></td>
                <td><?php echo $arreglo['nacimiento'];?></td>
                <td><?php echo $arreglo['rol'];?></td>
                <td><?php echo $arreglo['ciudad'];?></td>
                <td><?php echo $arreglo['genero'];?></td>
                <td><?php echo $arreglo['correo'];?></td>

                <td>
                    <center>
                        <form action="dashboard.php?mod=gestionar#modificar" method="post">
                            <input type="text" name="dato_modificar" value="<?php echo $arreglo['correo'];?>" hidden>
                            <button type="submit" name="btn_modificar" class="btn_modificar">
                                <i style="color: black; font-size: 20px;" class='bx bx-copy-alt'></i>
                            </button>
                        </form>
                    </center>
                </td>
                <td>
                    <center>
                    <form action="dashboard.php?mod=gestionar#modificar" method="post">
                            <input type="text" name="dato_eliminar" value="<?php echo $arreglo['correo'];?>" hidden>
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
        $consultam = mysqli_query($conexion, "SELECT * FROM clientes WHERE correo = '$datom';") or die($conexion."error");

        while($arreglom = mysqli_fetch_array($consultam)){

?>

<h1 style="color:#6f2503; text-align: center; font-weight: bold;">Modificar Usuario</h1>

<form action="dashboard.php?mod=gestionar" method="post" class="form_gestionar" style="max-width: 600px; margin: auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    
    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size: 20px; font-weight: bold;">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $arreglom['nombre'];?>" required
            style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;box-shadow: 0px 5px 10px grey; color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size: 20px; font-weight: bold;">Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $arreglom['apellidos'];?>" required
            style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: 0px 5px 10px grey; color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size: 20px; font-weight: bold;">Fecha de nacimiento</label>
        <input type="date" name="nacimiento" value="<?php echo $arreglom['nacimiento'];?>" required
            style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: 0px 5px 10px grey; color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size: 20px; font-weight: bold;">Rol</label>
        <input type="text" name="rol" value="<?php echo $arreglom['rol'];?>" required
            style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: 0px 5px 10px grey; color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color:#6f2503;font-size: 20px; font-weight: bold;">Ciudad de nacimiento</label>
        <input type="text" name="ciudad" value="<?php echo $arreglom['ciudad'];?>" required
            style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: 0px 5px 10px grey; color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color:#6f2503; font-size: 20px; font-weight: bold;">Género</label>
        <input type="text" name="genero" value="<?php echo $arreglom['genero'];?>" required
            style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: 0px 5px 10px grey; color:#6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503; font-size: 20px; font-weight: bold;">Correo</label>
        <input type="email" name="correo" value="<?php echo $arreglom['correo'];?>" required
            style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: 0px 5px 10px grey; color:#6f2503; text-align: center;">
    </div>

    <div style="text-align: center;">
        <button type="submit" name="BtnActualizar" class="btn1"
            style="background-color: #df9239; border: none; padding: 10px 20px; color: white; font-weight: bold; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
            Actualizar
        </button>
    </div>
</form>

<style>
    .form_gestionar{
        box-shadow: 0px 5px 10px grey !important;
    }
    .btn1:hover {
        background-color: #2980b9;
    }

    input:focus {
        outline: none;
        border: 1px solid #3498db;
    }
</style>


<?php
    }
} 
?>

</center>
</body>
</html>
