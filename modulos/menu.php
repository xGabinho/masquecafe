<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Productos</h4>
            <h1 class="display-4">Nuestros Productos</h1>
        </div>
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="row">
                    <?php
                    // Conectar a la base de datos
                    include "conexion.php"; // Asegúrate de que este archivo esté configurado correctamente

                    $query = "SELECT * FROM productos"; // Asegúrate de que la tabla y los campos sean correctos
                    $result = mysqli_query($conexion, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($producto = mysqli_fetch_assoc($result)) {
                            // Generar HTML para cada producto
                            echo "<div class='col-lg-6'>";
                            echo "<div class='row align-items-center mb-5'>";
                            echo "<div class='col-4 col-sm-3'>";
                            echo "<img class='w-100 rounded-circle mb-3 mb-sm-0' src='../../cafecito/login/dashboard/" . htmlspecialchars($producto['imagen']) . "' alt=''>";
                            echo "<h5 class='menu-price'>\$" . htmlspecialchars($producto['precio']) . "</h5>"; // Asegúrate de que el campo 'precio' exista
                            echo "</div>";
                            echo "<div class='col-8 col-sm-9'>";
                            echo "<h4>" . htmlspecialchars($producto['nombre']) . "</h4>";
                            echo "<p class='m-0'>" . htmlspecialchars($producto['descripcion']) . "</p>"; // Asegúrate de que el campo 'descripcion' exista
                            echo "<a href='index.php?mod=carrito' class='btn btn-primary font-weight-bold py-2 px-4 mt-2'>Comprar</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No hay productos disponibles.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div> 
</div>
