<body>
    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="text-white">Opinión</h1>
                            </div>
                            <p class="text-white">
                                Te invitamos a que la opinión que realices sea constructiva, es decir, que no solo señale 
                                aspectos a mejorar, sino que también ofrezca sugerencias o ideas para avanzar.
                            </p>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Sé específico y claro.</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Ofrece soluciones o sugerencias.</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Mantén un tono respetuoso y positivo.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Formulario para crear la opinión -->
                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">¿Qué Opinas?</h1>
                            <form action="index.php?mod=opinion" method="post" class="mb-5">
                                <div class="form-group">
                                    <input type="text" name="nombre" style="color:white;" 
                                           class="form-control bg-transparent border-primary p-4" 
                                           placeholder="Nombre" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" style="color:white;" 
                                           class="form-control bg-transparent border-primary p-4" 
                                           placeholder="Correo" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="number" name="telefono" style="color:white;" 
                                           class="form-control bg-transparent border-primary p-4" 
                                           placeholder="Teléfono" required="required" />
                                </div>
                                <div class="form-group">
                                    <textarea name="opinion" style="color:white; height:90px;" 
                                              class="form-control bg-transparent border-primary p-4" 
                                              placeholder="Opinión" required="required"></textarea>
                                </div>
                                <div>
                                    <button name="btn" class="btn btn-primary btn-block font-weight-bold py-3" type="submit">
                                        Enviar Opinión
                                    </button>
                                </div>
                            </form>

                            <?php
                                include "conexion.php";

                                $opinionEnviada = false; // Bandera para controlar la visualización

                                if (isset($_POST['btn'])) {
                                    $nombre = $_POST['nombre'];
                                    $email = $_POST['email'];
                                    $telefono = $_POST['telefono'];
                                    $opinion = $_POST['opinion'];

                                    $query = "INSERT INTO opinion (nombre, correo, telefono, opinion) 
                                              VALUES ('$nombre', '$email', '$telefono', '$opinion')";

                                    $contacto = mysqli_query($conexion, $query);

                                    if ($contacto) {
                                        $opinionEnviada = true; // Activar la bandera si se envía la opinión
                                    } else {
                                        echo "<script>alert('Error al enviar la opinión');</script>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mostrar el carrusel de testimonios solo si se envió una opinión -->
            <?php if (isset($opinionEnviada) && $opinionEnviada): ?>
<div class="container-fluid py-5" style="background: #f9f9f9;">
    <div class="container">
        <div class="section-title" id="Software">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Opiniones</h4>
            <h1 class="display-4">Lo Que Dicen Nuestros Clientes</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php
                // Obtener las opiniones de la base de datos
                $consulta = mysqli_query($conexion, "SELECT * FROM opinion");
                if (mysqli_num_rows($consulta) > 0) { // Solo muestra el carrusel si hay opiniones
                    while ($arreglo = mysqli_fetch_array($consulta)) {
            ?>
            <div class="testimonial-item" style="border-radius: 10px; background: white; padding: 20px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-align: center;">
                <i class="fa-solid fa-user" style="font-size:35px;"></i>
                <h4 style="color: #6f2503;"><?php echo $arreglo['nombre']; ?></h4>
                <p class="m-0" style="color: #555;"><?php echo $arreglo['opinion']; ?></p>
            </div>
            <?php
                    }
                } else {
                    echo "<p>No hay opiniones disponibles.</p>"; // Mensaje si no hay opiniones
                }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>


        </div>
    </div>
</body>

