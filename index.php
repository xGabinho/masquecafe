<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Más Que Café</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/sobre.css">
    <link rel="stylesheet" href="style/shop.css">
</head>
<body>

<style>



.navbar-icons {
    display: flex;
    align-items: center; /* Alinear verticalmente los íconos */
    margin-left: 20px; /* Espaciado a la izquierda de los íconos */
}

.navbar-icons i{
    position: relative;
    color: white;
    font-size: 24px; /* Tamaño de los íconos */
    text-decoration: none; /* Quitar subrayado */
    cursor: pointer; /* Cambiar cursor al pasar el mouse */
    right: 20px;
}

.navbar-icons i:hover{
    color:  #DA9F5B;
}

/* Estilo general para los íconos */
.nav-icon {
    position: relative;
    color: white;
    right: 30px;
    font-size: 24px; /* Tamaño de los íconos */
    margin-left: 27px; /* Espacio entre íconos */
    text-decoration: none; /* Quitar subrayado */
    cursor: pointer; /* Cambiar cursor al pasar el mouse */
}

/* Contador del carrito en la esquina superior derecha del ícono */
#cart-item-count {
    position: absolute;
    top: -13px;
    background-color: #DA9F5B; /* Fondo rojo para el contador */
    color: white; /* Color del texto del contador */
    border-radius: 50%; /* Bordes redondeados */
    padding: 3px 6px; /* Espaciado interno */
    font-size: 12px; /* Tamaño de fuente del contador */
}

/* Cambiar color de íconos al pasar el mouse */
.nav-icon:hover {
    color: #f1c40f; /* Color de hover para los íconos */
}

.cart {
    position: fixed;
    z-index: 1000;
}

.cart-remove {
    color: white;
    font-size: 13px;
    position: relative; /* Necesario para los pseudo-elementos */
    width: 40px; /* Diámetro del círculo */
    height: 40px; /* Diámetro del círculo */
    background-color: transparent; /* Sin color de fondo */
    border-radius: 50%; /* Bordes redondeados al 50% para ser circular */
    display: flex; /* Para centrar el ícono */
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Sombra para el círculo */
}

/* Crear el basurero con pseudo-elementos */
.cart-remove::before {
    content: '';
    position: absolute;
    bottom: 5px; /* Posiciona el cuerpo del basurero */
    left: 50%;
    transform: translateX(-50%);
    width: 24px; /* Ancho del cuerpo del basurero */
    height: 25px; /* Alto del cuerpo del basurero */
    background-color: rgba(218, 159, 91, 0.9); /* Color del cuerpo del basurero con transparencia */
    border-radius: 5px 5px 0 0; /* Bordes redondeados solo en la parte superior */
}

/* Crear la tapa del basurero */
.cart-remove::after {
    content: '';
    position: absolute;
    bottom: 30px; /* Posiciona la tapa del basurero */
    left: 50%;
    transform: translateX(-50%);
    width: 28px; /* Ancho de la tapa */
    height: 8px; /* Alto de la tapa */
    background-color: rgba(218, 159, 91, 0.9); /* Color de la tapa con transparencia */
    border-radius: 5px; /* Bordes redondeados */
}

/* Añadir agujeros de ventilación */
.cart-remove::before::after {
    content: '';
    position: absolute;
    top: 5px; /* Posición del agujero */
    left: 5px; /* Posición del agujero */
    width: 3px; /* Ancho del agujero */
    height: 3px; /* Alto del agujero */
    background-color: #B18A5C; /* Color del agujero */
    border-radius: 50%; /* Hacer el agujero circular */
}

.cart-remove::before::after {
    content: '';
    position: absolute;
    top: 5px; /* Posición del agujero */
    right: 5px; /* Posición del agujero */
    width: 3px; /* Ancho del agujero */
    height: 3px; /* Alto del agujero */
    background-color: #B18A5C; /* Color del agujero */
    border-radius: 50%; /* Hacer el agujero circular */
}


.navbar-icons {
    position: relative; /* Permitir posicionar el menú de usuario */
}

.user-menu {
    display: none; /* Ocultar el menú por defecto */
    position: absolute; /* Posicionarlo de forma absoluta */
    background-color: white; /* Fondo del menú */
    border: 1px solid #ccc; /* Borde del menú */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para el menú */
    z-index: 1000; /* Asegurar que esté encima de otros elementos */
    margin-top: 202px; /* Espacio entre el icono y el menú */
    margin-left: -150%;
    padding: 10px; /* Espaciado interno */
    border-radius: 5px; /* Bordes redondeados */
    width: 200px; /* Ancho del menú */
    text-align: center; /* Centrar el texto */
}

.welcome-message, .welcome-name {
    font-weight: bold; /* Negrita para el mensaje de bienvenida */
    margin: 0; /* Sin margen para alinear mejor */
    text-align: center; /* Centrar el texto */
}

.welcome-name {
    margin-bottom: 10px; /* Espacio entre el mensaje y los botones */
}

.user-menu a {
    display: block; /* Mostrar como bloque para los botones */
    width: 100%; /* Hacer que los botones ocupen el 100% del ancho del contenedor */
    text-align: center; /* Centrar el texto en los botones */
    margin: 5px 0; /* Margen entre botones */
}

#user-icon:hover + .user-menu,
.user-menu:hover {
    display: block; /* Mostrar el menú al pasar el mouse sobre el icono o el menú */
}


.img-logo{
height:100px;
}







</style>



    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="index.php?mod=inicio" class="navbar-brand px-lg-4 m-0">
            <img class="img-logo" src="img/logo.png" alt="">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="index.php?mod=inicio" class="nav-item nav-link active">Nosotros</a>
                <a href="index.php?mod=service" class="nav-item nav-link">Servicios</a>
                <a href="index.php?mod=menu" class="nav-item nav-link">Productos</a>
                <a href="index.php?mod=opinion" class="nav-item nav-link">Opinión</a>
                <a href="index.php?mod=contact" class="nav-item nav-link">Contacto</a>
            </div>

            <!-- Íconos alineados junto al menú -->
            <div class="navbar-icons">
                <a href="#" class="nav-icon" id="user-icon">
                    <i class="fas fa-user" id="user-btn"></i>
                </a>
                <div class="user-menu" id="user-menu">
    <?php if (isset($_SESSION['nombre'])): ?>
        <div class="welcome-message">¡Bienvenid@ </div>
        <div class="welcome-name"><?php echo htmlspecialchars($_SESSION['nombre']),"¡"; ?></div>
        <a href="login/salir.php" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Cerrar Sesión</a>
        <a href="login/registrar.php" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Crear Cuenta</a>
    <?php else: ?>
        <div class="welcome-message">¡Bienvenid@, invitad@!
        <a href="login/login.php" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Iniciar Sesión</a>
        <a href="login/registrar.php" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Crear Cuenta</a>
        </div>
    <?php endif; ?>
</div>

            
                <i class='fas fa-shopping-cart' id="cart-icon">
                    <span id="cart-item-count">0</span>
                </i>
                <i class="fas fa-bars nav-icon" id="menu-btn"></i>
            </div>

        </div>
    </nav>

    <div class="cart">
        <h2 class="cart-title">Tus Compras</h2>
        <div class="cart-content">
            
        </div>
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">$0</div>
        </div>
        <a class="btn-buy btn btn-primary font-weight-bold py-2 px-4 mt-2">Comprar</a>
        <i class="fa-solid fa-xmark" id="close-cart"></i>
    </div>
</div>

    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-lg-5" style="min-height: 400px; margin-top:-5px;">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Nuestra Compañía</h1>
        </div>
    </div>



    <?php
                    if(@$_GET['mod'] == "") {
                        require_once("modulos/index.php");
                    }else
                    if(@$_GET['mod'] == "inicio") {
                       require_once("modulos/index.php");
                    }else
                    if(@$_GET['mod'] == "about") {
                        require_once("modulos/about.php");
                     }else
                     if(@$_GET['mod'] == "contact") {
                        require_once("modulos/contact.php");
                    }else
                    if(@$_GET['mod'] == "equipo") {
                       require_once("modulos/equipo.php");
                    }else
                    if(@$_GET['mod'] == "menu") {
                       require_once("modulos/menu.php");
                    }else
                    if(@$_GET['mod'] == "opinion") {
                       require_once("modulos/opinion.php");
                    }else
                    if(@$_GET['mod'] == "service") {
                       require_once("modulos/service.php");
                    }else
                    if(@$_GET['mod'] == "sobre") {
                       require_once("modulos/sobre.php");
                    }else
                    if(@$_GET['mod'] == "testimonios") {
                       require_once("modulos/testimonios.php");
                    }else
                    if(@$_GET['mod'] == "carrito") {
                       require_once("modulos/carrito.php");
                    }

                    
    ?>



    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4 justify-content-center text-center">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Nuestra Ubicación</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Cra. 37 #57-90, La Candelaria, Medellín.</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+57 345 67890</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>masquecafe@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Siguenos</h4>
                <p>No te pierdas nuestras últimas novedades, ofertas especiales y contenido exclusivo. Únete a nuestra comunidad y comparte este viaje con nosotros.</p>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Horario</h4>
                <div>
                    <h6 class="text-white text-uppercase">Lunes - Viernes</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Sabado - Domingo</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
        </div>
    
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" 
             style="border-color: rgba(255, 255, 255, 0.1) !important;">
            <p class="mb-2 text-white">
                Copyright &copy; <a class="font-weight-bold" href="#">Domain</a>. All Rights Reserved.
            </p>
            <p class="m-0 text-white">
                Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
    </div>
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
    <script src="jscarrito/main.js"></script>
    <script src="jscarrito/menu.js"></script>
    <script src="jscarrito/scrool.js"></script>
</body>

</html>