
<body>
    
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contactanos</h4>
                <h1 class="display-4">No Dude En Contactarnos</h1>
            </div>
            <div class="row px-3 pb-2">
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Ubicación</h4>
                    <p>Cra. 37 #57-90, La Candelaria, Medellín.</p>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Teléfono</h4>
                    <p>+57 345 6789</p>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Correo</h4>
                    <p>masquecafe@gmail.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 pb-5">
                    <iframe style="width: 100%; height: 443px;"
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.2535871403957!2d-75.5577402259558!3d6.249594726287687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428f5bf1333f1%3A0x193f0301140e12f4!2sCra.%2037%20%2357-90%2C%20La%20Candelaria%2C%20Medell%C3%ADn%2C%20La%20Candelaria%2C%20Medell%C3%ADn%2C%20Antioquia!5e1!3m2!1ses-419!2sco!4v1729257292228!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-6 pb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form method="post" action="index.php?mod=contact" name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" name="nombre" class="form-control bg-transparent p-4" id="name" placeholder="Tu Nombre"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control bg-transparent p-4" id="email" placeholder="Tu Correo"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" name="telefono" class="form-control bg-transparent p-4" id="telefono" placeholder="Tu Teléfono"
                                    required="required" data-validation-required-message="Please enter your phone" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea name="mensaje" class="form-control bg-transparent py-3 px-4" rows="5" id="message" placeholder="Mensaje"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button name="btn" class="btn btn-primary font-weight-bold py-3 px-5" type="submit" id="sendMessageButton">Enviar
                                    Mensaje
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
if(isset($_POST['btn'])){
    include "conexion.php";
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    $query = "INSERT INTO `contacto` (`nombre`, `correo`, `telefono`, `mensaje`) VALUES ('$nombre', '$email', '$telefono', '$mensaje');";

    $contacto = mysqli_query($conexion,$query);

    echo"<script>alert('Gracias por contactarnos')</script>";
}
?>