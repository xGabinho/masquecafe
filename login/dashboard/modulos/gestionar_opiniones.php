<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <h1 style="color:#6f2503; font-weight: bold;">Gestión De Opiniones</h1>
<form action="dashboard.php?mod=gestionar_opiniones" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
        <input name="buscar" style="box-shadow: 0px 2px 10px grey;" type="text" class="form-control bg-light border-0 small" placeholder="Nombre"
        aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <button style="background: #df9239;color:black; box-shadow: 0px 2px 10px grey;" class="btn"  name="btn_search" type="submit">
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
    $eliminar = mysqli_query($conexion,"DELETE FROM `opinion` WHERE `telefono` = '$dato_eliminar';");
    
    echo "<script>alert('Dato eliminado con eso');</script>";
    echo "<script>window.location='dashboard.php?mod=gestionar_opiniones';</script>";
}
if(isset($_POST['BtnActualizar'])){
    include 'conexion.php';
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $opinion = $_POST['opinion'];

    $modificar = mysqli_query($conexion,"UPDATE `opinion` SET `nombre` = '$nombre', `correo` = '$correo', `telefono` = '$telefono', `opinion` = '$opinion' WHERE `opinion`.`telefono` = '$telefono';");

    echo "<script>alert('Actualizacion Exitosa');</script>";
    echo "<script>window.location='dashboard.php?mod=gestionar_opiniones';</script>";
}
    if(isset($_POST['btn_search'])){
        include 'conexion.php';
        $dato = $_POST['buscar'];
?>

        <div style="border-radius: 20px; " class="card shadow mb-4">
    <div  style="background-color: #6f2503;" class="card-header py-3">
        <h6 style="color:#6f2503; font-size: 20px;" class="m-0 font-weight-bold text-primary">Compras</h6>
    </div>
<div style="box-shadow: 0px 5px 10px grey; border:none; background-color: white; border-radius: 20px;" class="card-body">
    <div style="background: white;  border: none; color:#6f2503;" class="table-responsive">
        <table  style="  border: none; color: #6f2503; background-color: white;"class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr style="color: #6f2503; font-weight: bold;">
                <td>Nombre</td>
                <td>Correo</td> 
                <td>Telefono</td>
                <td>Opinion</td>
                <td>Modificar</td>
                <td>Eliminar</td>
            </tr>
            <?php
                $consulta = mysqli_query($conexion,"SELECT * FROM opinion WHERE telefono LIKE '%$dato%';") or die ($conexion."Error en la consulta");

                while($arreglo=mysqli_fetch_array($consulta)){
            ?>
            <tr>
                <td><?php echo $arreglo['nombre'];?></td>
                <td><?php echo $arreglo['correo'];?></td>
                <td><?php echo $arreglo['telefono'];?></td>
                <td><?php echo $arreglo['opinion'];?></td>

                <td>
                    <center>
                        <form action="dashboard.php?mod=gestionar_opiniones#modificar" method="post">
                            <input type="text" name="dato_modificar" value="<?php echo $arreglo['telefono'];?>" hidden>
                            <button type="submit" name="btn_modificar" class="btn_modificar">
                                <i style="color: black; font-size: 20px;" class='bx bx-copy-alt'></i>
                            </button>
                        </form>
                    </center>
                </td>
                <td>
                    <center>
                    <form action="dashboard.php?mod=gestionar_opiniones#modificar" method="post">
                            <input type="text" name="dato_eliminar" value="<?php echo $arreglo['telefono'];?>" hidden>
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
        $consultam = mysqli_query($conexion, "SELECT * FROM opinion WHERE telefono = '$datom';") or die($conexion."error");

        while($arreglom = mysqli_fetch_array($consultam)){

?>

<h1 style="color: #6f2503 ;text-align: center; font-weight: bold; margin-top: -20px;">Modificar compras</h1>

<form action="dashboard.php?mod=gestionar_opiniones" method="post" class="form_gestionar" style="max-width: 600px; margin: auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0px 5px 10px grey;">
    

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size:20px; font-weight: bold;">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $arreglom['nombre'];?>" required
            style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ccc;box-shadow: 0px 5px 10px grey;  color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size:20px; font-weight: bold;">Correo</label>
        <input type="email" name="correo" value="<?php echo $arreglom['correo'];?>" required
            style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ccc;box-shadow: 0px 5px 10px grey; color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size:20px; font-weight: bold;">Telefono</label>
        <input type="number" name="telefono" value="<?php echo $arreglom['telefono'];?>" required readonly
            style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ccc;box-shadow: 0px 5px 10px grey; color: #6f2503; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: #6f2503;font-size:20px; font-weight: bold;">Opinion</label>
        <input type="text" name="opinion" value="<?php echo $arreglom['opinion'];?>" required
            style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ccc;box-shadow: 0px 5px 10px grey;  color: #6f2503; text-align: center;">
    </div>

    <div style="text-align: center;">
        <button type="submit" name="BtnActualizar" class="btn1"
            style="background-color: #df9239; border: none; padding: 10px 20px; color: #6f2503; font-weight: bold; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
            Actualizar
        </button>
    </div>
</form>

<style>
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
