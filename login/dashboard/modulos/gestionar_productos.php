<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión De Productos</title>
    <!-- Agrega los enlaces a Bootstrap y FontAwesome si los usas -->
    <style>
        body {
            background-color: #131313;
            color: #6f2503;
        }
        .imagen-superior-derecha {
            margin-top: 15px !important;
            display: flex;
            justify-content: center;
            width: 100%;
            margin-left: 0;
        }
        .form_gestionar {
            overflow: hidden; /* Para que los elementos floten correctamente */
        }
        .btn_modificar {
            background: none;
            border: none;
            color: #ffffff;
            cursor: pointer;
            font-size: 1.2em;
        }
        .btn_modificar:hover {
            color: #d6b991;
        }
        .btn1:hover {
            background-color: #2980b9;
        }
        input:focus {
            outline: none;
            border: 1px solid #3498db;
        }
    </style>
</head>
<body>
<center>
    <h1 style="font-weight: bold; color: #6f2503;">Gestión De Productos</h1>
    <form action="dashboard.php?mod=gestionar_productos" method="post" 
          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input style="box-shadow: 0px 2px 10px grey;" name="buscar" type="text" class="form-control bg-light border-0 small" 
                   placeholder="Nombre" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button style="background: #df9239; box-shadow: 0px 2px 10px grey;" class="btn " name="btn_search" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <br><br>

    <?php
    if (isset($_POST['btn_eliminar'])) {
        include 'conexion.php';
        $dato_eliminar = mysqli_real_escape_string($conexion, $_POST['dato_eliminar']);

        // Obtener la ruta de la imagen antes de eliminar
        $query_img = mysqli_query($conexion, "SELECT imagen FROM productos WHERE id_producto='$dato_eliminar'");
        if ($query_img) {
            $img_data = mysqli_fetch_assoc($query_img);
            $img_path = $img_data['imagen'];
        } else {
            $img_path = '';
        }

        // Eliminar el producto de la base de datos
        $eliminar = mysqli_query($conexion, "DELETE FROM productos WHERE id_producto = '$dato_eliminar'");

        if ($eliminar) {
            // Eliminar el archivo de imagen si existe
            if (!empty($img_path) && file_exists($img_path)) {
                unlink($img_path);
            }
            echo "<script>alert('Producto eliminado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al eliminar producto');</script>";
        }
        echo "<script>window.location='dashboard.php?mod=gestionar_productos';</script>";
    }

    if (isset($_POST['BtnActualizar'])) {
        include 'conexion.php';
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $id_producto = mysqli_real_escape_string($conexion, $_POST['id_producto']);
        $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
        $stock = mysqli_real_escape_string($conexion, $_POST['stock']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

        $img_file = $_FILES['imagen']['name'];
        $img_temp = $_FILES['imagen']['tmp_name'];
        $upload_dir = "uploads/";
        $img_path = '';

        if (!empty($img_file)) {
            // Generar un nombre único para la imagen
            $img_path = $upload_dir . uniqid() . '_' . basename($img_file);
            if (move_uploaded_file($img_temp, $img_path)) {
                // Actualizar con la nueva imagen
                $modificar = mysqli_query($conexion, 
                    "UPDATE productos SET nombre='$nombre', stock='$stock', precio='$precio', descripcion='$descripcion', imagen='$img_path' 
                     WHERE id_producto='$id_producto'");
            } else {
                echo "<script>alert('Error al subir la imagen');</script>";
                echo "<script>window.location='dashboard.php?mod=gestionar_productos';</script>";
                exit();
            }
        } else {
            // Actualizar sin modificar la imagen
            $modificar = mysqli_query($conexion, 
                "UPDATE productos SET nombre='$nombre', stock='$stock', precio='$precio', descripcion='$descripcion' 
                 WHERE id_producto='$id_producto'");
        }

        if ($modificar) {
            echo "<script>alert('Actualización exitosa');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conexion) . "');</script>";
        }
        echo "<script>window.location='dashboard.php?mod=gestionar_productos';</script>";
    }

    if (isset($_POST['btn_search'])) {
        include 'conexion.php';
        $dato = mysqli_real_escape_string($conexion, $_POST['buscar']);
    ?>
        <div style="border-radius: 20px;" class="card shadow mb-4">
            <div class="card-header py-3" style="background-color: #6f2503;">
                <h6 style="color:#6f2503; font-size: 20px;" class="m-0 font-weight-bold">Productos</h6>
            </div>
            <div class="card-body" style="background-color: white; border-radius: 20px;">
                <div style="background: white; color:#6f2503;" class="table-responsive">
                    <table style="color: #6f2503; background-color: white;" class="table table-bordered" width="100%" cellspacing="0">
                        <tr style="color: #6f2503;">
                            <th style="color: #6f2503;">ID Producto</th>
                            <th style="color: #6f2503;">Nombre</th>
                            <th style="color: #6f2503;">Stock</th>
                            <th style="color: #6f2503;">Precio</th>
                            <th style="color: #6f2503;">Descipción</th>
                            <th style="color: #6f2503;">Imagen</th>
                            <th style="color: #6f2503;">Modificar</th>
                            <th style="color: #6f2503;">Eliminar</th>
                        </tr>
                        <?php
                        $consulta = mysqli_query($conexion, 
                            "SELECT * FROM productos WHERE nombre LIKE '%$dato%'");
        
                        while ($arreglo = mysqli_fetch_array($consulta)) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($arreglo['id_producto']); ?></td>
                            <td><?php echo htmlspecialchars($arreglo['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($arreglo['stock']); ?></td>
                            <td><?php echo htmlspecialchars($arreglo['precio']); ?></td>
                            <td><?php echo htmlspecialchars($arreglo['descripcion']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($arreglo['imagen']); ?>" alt="Imagen del Producto" 
                                     style="width: 100px; height: 100px;">
                            </td>
                            <td>
                                <form action="dashboard.php?mod=gestionar_productos#modificar" method="post">
                                    <input type="hidden" name="dato_modificar" value="<?php echo htmlspecialchars($arreglo['id_producto']); ?>">
                                    <button type="submit" name="btn_modificar" class="btn_modificar" title="Modificar">
                                        <i style=" margin-left: 60px;color: black; font-size: 20px;" class='bx bx-copy-alt'></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="dashboard.php?mod=gestionar_productos" method="post">
                                    <input type="hidden" name="dato_eliminar" value="<?php echo htmlspecialchars($arreglo['id_producto']); ?>">
                                    <button type="submit" name="btn_eliminar" class="btn_modificar" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                        <i style=" margin-left: 60px;color: black; font-size: 20px;" class='bx bx-folder-minus'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>

    <i id="modificar"></i><br>
    <?php
    if (isset($_POST['btn_modificar'])) {
        include 'conexion.php';
        $datom = mysqli_real_escape_string($conexion, $_POST['dato_modificar']);
        $consultam = mysqli_query($conexion, "SELECT * FROM productos WHERE id_producto = '$datom'");

        if ($arreglom = mysqli_fetch_array($consultam)) {
    ?>
    <h1 style="color: #6f2503 ;text-align: center; font-weight: bold; margin-top: -20px;">Modificar Producto</h1>
    <form action="dashboard.php?mod=gestionar_productos" enctype="multipart/form-data" method="post" 
          class="form_gestionar" style="max-width: 500px; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0px 5px 10px grey; 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="imagen-superior-derecha">
            <div>
                <h5 style="color:#6f2503; font-size:20px; font-weight: bold;">Imagen del producto</h5>
                <!-- Input de archivo oculto -->
                <input type="file" id="imagenInput" name="imagen" class="form-control-crear" accept="image/*" style="display: none;">
                <!-- Imagen que actuará como el selector de archivo -->
                <img src="<?php echo htmlspecialchars($arreglom['imagen']); ?>" id="imagenVista" alt="Imagen actual" 
                     style="width: 100px; height: 100px; margin-top: 10px; cursor: pointer; border-radius: 5px;">
            </div>
        </div>

        <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($arreglom['id_producto']); ?>">
        
        <div style="margin-bottom: 15px;">
            <label style="color: #6f2503; font-weight: bold;">Nombre</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($arreglom['nombre']); ?>" required
                style="width: 100%; padding: 10px; border-radius: 10px; border:none; box-shadow: 0px 5px 10px grey;color: #6f2503; text-align: center;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="color: #6f2503; font-weight: bold;">Stock</label>
            <input type="number" name="stock" value="<?php echo htmlspecialchars($arreglom['stock']); ?>" required
                style="width: 100%; padding: 10px; border-radius: 10px; border:none; box-shadow: 0px 5px 10px grey;#292929; color: #6f2503; text-align: center;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="color: #6f2503; font-weight: bold;">Precio</label>
            <input type="text" name="precio" value="<?php echo htmlspecialchars($arreglom['precio']); ?>" required
                style="width: 100%; padding: 10px; border-radius: 10px; border:none; box-shadow: 0px 5px 10px grey;color: #6f2503; text-align: center;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="color: #6f2503; font-weight: bold;">Descripción</label>
            <input type="text" name="descripcion" value="<?php echo htmlspecialchars($arreglom['descripcion']); ?>" required
                style="width: 100%; padding: 10px; border-radius: 10px; border:none; box-shadow: 0px 5px 10px grey;color: #6f2503; text-align: center;">
        </div>
        <div style="text-align: center; margin-bottom: 15px;">
            <button type="submit" name="BtnActualizar" class="btn1"
                style="background-color: #df9239; border: none; padding: 10px 20px; color: #6f2503; font-weight: bold; border-radius: 10px; cursor: pointer; transition: background-color 0.3s;">
                Actualizar
            </button>
        </div>
    </form>
    <?php 
        } else {
            echo "<script>alert('Producto no encontrado');</script>";
            echo "<script>window.location='dashboard.php?mod=gestionar_productos';</script>";
        }
    } 
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imagenVista = document.getElementById('imagenVista');
            var imagenInput = document.getElementById('imagenInput');

            if (imagenVista && imagenInput) {
                imagenVista.addEventListener('click', function() {
                    imagenInput.click();
                });

                imagenInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagenVista.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
</center>

<!-- Agrega los scripts de Bootstrap si los usas -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
