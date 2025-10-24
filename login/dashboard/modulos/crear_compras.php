<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['btn'])){
    include "conexion.php";
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precioUni = $_POST['precioUni'];
    $precioTotal = $_POST['precioTotal'];
    $metodo = $_POST['metodo'];

    $query = "INSERT INTO `compras` (`id_producto`, `nombre_comprador`, `fecha`, `descripcion`, `cantidad`, `precio_unitario`, `precio_total`, `metodo_pago`) VALUES ('$id', '$nombre', '$fecha', '$descripcion', '$cantidad', '$precioUni', '$precioTotal', '$metodo');";

    $registrar = mysqli_query($conexion,$query);

    echo"<script>alert('Registro de compra exitoso');</script>";
    }
?>

<form action="dashboard.php?mod=crear_compras" method="post" class="form_gestionar" style="max-width: 600px; margin: auto; background-color: white; color:#6f2503; padding: 20px; border-radius: 10px; box-shadow: 0px 5px 10px grey;">
    <h1 style="font-weight: bold; display: block; text-align: center;">Realizar compra</h1>
    <div style="margin-bottom: 15px;">
        <label style="font-size:20px; font-weight: bold; display: block; text-align: center;">Id_producto</label>
        <input type="number" name="id" required
            placeholder="Id Producto" style="width: 100%; color:#6f2503; padding: 13px; border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-size:20px; font-weight: bold; display: block; text-align: center;">Nombre del comprador</label>
        <input type="text" name="nombre" required  placeholder="Nombre Del Comprador"
            style="width: 100%; color:#6f2503; padding: 13px;  border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-size:20px; font-weight: bold; display: block; text-align: center;">Fecha de compra</label>
        <input type="date" name="fecha"  required
            style="width: 100%; color:#6f2503; padding: 13px;  border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-size:20px; font-weight: bold; display: block; text-align: center;">Descripcion</label>
        <input type="text" name="descripcion"required  placeholder="Descripciòn"
            style="width: 100%; color:#6f2503; padding: 13px;  border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-size:20px;; font-weight: bold; display: block; text-align: center;">Cantidad</label>
        <input type="number" name="cantidad" required  placeholder="Cantidad"
            style="width: 100%; color:#6f2503; padding: 13px;  border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-size:20px;; font-weight: bold; display: block; text-align: center;">Precio unitario</label>
        <input type="number" name="precioUni" required  placeholder="Precio unitario"
            style="width: 100%; color:#6f2503; padding: 13px;  border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-size:20px;; font-weight: bold; display: block; text-align: center;">Precio total</label>
        <input type="number" name="precioTotal" required placeholder="Precio Total"
            style="width: 100%; color:#6f2503; padding: 13px;  border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-size:20px;; font-weight: bold; display: block; text-align: center;">Metodo de pago</label>
        <input type="text" name="metodo"required placeholder="Metodo de pago"
            style="width: 100%; color:#6f2503; padding: 13px;  border-radius: 10px;box-shadow: 0px 5px 10px grey; text-align: center;">
    </div>

    <div style="text-align: center;">
        <button type="submit" name="btn" class="btn1"
            style="background-color:#df9239; border: none; color:#6f2503; padding: 10px 20px; font-weight: bold; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
            Actualizar
        </button>
    </div>
</form>

<style>
    .btn1:hover {
        background-color: #2980b9;
    }
    input{
        border:none;
    }
    input::placeholder{
        font-size: 14px;
        color: grey !important;
    }
    input:focus {
        outline: none;
        border: 1px solid white;
    }
</style>


</body>