<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <style>
        .inner {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px grey;
        }

        .form-group {
            text-align: center;
            margin-bottom: 15px;
        }

        .form-control-crear {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px grey;
            border: none;
            color: #6f2503;
            text-align: center;
        }

        .button {
            background-color: #df9239;
            border: none;
            padding: 10px 20px;
            color: #6f2503;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #df9239;
        }

        input:focus {
            outline: none;
            border: 1px solid white;
        }
    </style>
</head>
<body>

<?php
if (isset($_POST['btn_registrarp'])) {
    include "conexion.php";
    
    $nombre = $_POST['nombre'];
    $id_producto = $_POST['id_producto'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $uploads_dir = 'uploads'; // Carpeta donde se guardarán las imágenes
        $tmp_name = $_FILES['imagen']['tmp_name'];
        $name = basename($_FILES['imagen']['name']);
        $uploadfile = "$uploads_dir/$name";

        // Crea la carpeta de destino si no existe
        if (!is_dir($uploads_dir)) {
            mkdir($uploads_dir, 0777, true);
        }

        // Mueve el archivo de la ubicación temporal a la carpeta de destino
        if (move_uploaded_file($tmp_name, $uploadfile)) {
            // Inserta la información en la base de datos
            $query = "INSERT INTO `productos` (`id_producto`, `nombre`, `stock`, `precio`, `descripcion`, `imagen`) VALUES ('$id_producto', '$nombre', '$stock', '$precio', '$descripcion', '$uploadfile');";

            $registrar = mysqli_query($conexion, $query);

            if ($registrar) {
                echo "<script>alert('Producto creado exitosamente');</script>";
            } else {
                echo "<script>alert('Error al crear el producto en la base de datos.');</script>";
            }
        } else {
            echo "<script>alert('Error al cargar la imagen.');</script>";
        }
    } else {
        echo "<script>alert('No se ha seleccionado ninguna imagen o ha ocurrido un error.');</script>";
    }
}
?>

<div class="inner">
    <form action="dashboard.php?mod=crear_productos" enctype="multipart/form-data" method="post" class="form-crear">
        <h1 class="h3" style="text-align: center; color: #6f2503; font-weight: bold;">CREAR PRODUCTO</h1>

        <div class="form-group">
            <h1 style="color: #6f2503; font-size: 20px; font-weight: bold;">Imagen del producto</h1>
            <input type="file" id="imagenInput" name="imagen" class="form-control-crear" accept="image/*" required style="display: none;">
            <img src="" id="imagenVista" alt="Imagen actual" style="width: 100px; height: 100px; margin-top: 10px; cursor: pointer;">
        </div>

        <div class="form-group">
            <label style="color: #6f2503; font-weight: bold;">Nombre:</label>
            <input type="text" name="nombre" class="form-control-crear" placeholder="Nombre" required>
        </div>

        <div class="form-group">
            <label style="color: #6f2503; font-weight: bold;">ID Producto:</label>
            <input type="number" name="id_producto" class="form-control-crear" placeholder="ID Producto" required>
        </div>

        <div class="form-group">
            <label style="color: #6f2503; font-weight: bold;">Stock:</label>
            <input type="number" name="stock" class="form-control-crear" placeholder="Stock" required>
        </div>

        <div class="form-group">
            <label style="color: #6f2503; font-weight: bold;">Precio:</label>
            <input type="text" name="precio" class="form-control-crear" placeholder="Precio" required>
        </div>

        <div class="form-group">
            <label style="color: #6f2503; font-weight: bold;">Descripción:</label>
            <input type="text" name="descripcion" class="form-control-crear" placeholder="Descripción" required>
        </div>

        <div class="form-end" style="text-align: center; margin-top: 20px;">
            <input class="button" type="submit" name="btn_registrarp" value="Crear producto">
        </div>
    </form>
</div>

<script>
    document.getElementById('imagenVista').addEventListener('click', function() {
        document.getElementById('imagenInput').click();
    });

    document.getElementById('imagenInput').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagenVista').src = e.target.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

</body>
</html>
