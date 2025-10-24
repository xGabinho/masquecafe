<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        #menu-btn{
    display: none;
}

.shop-content{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(260px,auto));
    gap: 2.5rem;
}

.product-box{
    position: relative;
    text-align: center;
    border-radius: 10px;
    border: 1px solid grey;
    height: 400px; /* Altura fija */
    background-color: white;
    width: 350px; /* Ancho fijo para el contenedor */
    overflow: hidden; /* Oculta partes de la imagen que sobresalen */
    margin: 0 auto; 
    display: flex; /* Activa flexbox */
    flex-direction: column; /* Organiza los elementos en columna */
    align-items: center; 
    transition: all 400ms ease-out;
}

.product-box:hover {
    transform: translateY(-15px); /* Efecto hover para mejorar la experiencia visual */
    box-shadow: 0 4px 8px #DA9F5B; /* Sombra del contenedor */
  }

.product-img{
    margin-top: 60px;
    width: 70% !important;/* La imagen ocupa el 100% del ancho del contenedor */
    height: 200px; /* Mantiene la relación de aspecto */
    object-fit: cover; 
}

.product-title{
    margin-top: 25px;
    font-size: 1.3rem;
    color: black;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
}

.price{
    font-weight: 500;
    color: black;
    font-size: 20px;
}

.price-des{
    text-decoration: line-through;
    font-weight: lighter;
    color: black;
}

.price span{
    text-decoration: line-through;
    font-weight: lighter;
}

.add-cart{
    margin-top: 15px; /* Espacio arriba del botón */
    position: absolute;
    font-size: 25px;
    text-decoration: none; /* Quitar subrayado del enlace */
    color: black; /* Color del texto */
    border-radius: 5px; /* Bordes redondeados */
    transition: background-color 0.3s; /* Transición al pasar el mouse */
    align-self: center;
}

.add-cart:hover{
    cursor: pointer;
    transition: .5s;
}
.cart{
    position: fixed;
    top: 0;
    right: -100%;
    width: 360px;
    min-height: 100vh;
    padding: 20px;
    background: rgba(0, 0, 0, 0.7);
    border-left: var(--border);
    transition: 0.7s;
}

.cart.active{
    right: 0;
}

.cart-title{
    text-align: center;
    font-size: 2rem;
    font-weight: 600;
    margin-top: 2rem;
    color: white;
}

.cart-content{
    font-size: 15px;
}

.cart-title span{
    color: var(--main-color);
}

.cart .total-title{
    font-size: 15px;
}

.cart .total-price{
    font-size: 15px;
}

input{
    font-size: 20px;
}

.cart-box{
    display: grid;
    grid-template-columns: 32% 50% 18%;
    align-items: center;
    gap: 1rem;
    margin-top: 1rem;
}

.cart-img{
    width: 100px;
    height: 100px;
    object-fit: contain;
    padding: 10px;
}

.detail-box{
    display: grid;
    row-gap: 0.5rem;
}

.cart-product-title{
    font-size: 1rem;
    text-transform: uppercase;
}

.cart-price{
    font-weight: 500;
}

.cart-quantity{
    border: 1px solid var(--text-color);
    outline-color: grey;
    width: 2.4rem;
    text-align: center;
    font-size: 1rem;
}

.cart-remove{
    font-size: 12px;
    color: var(--main-color);
    cursor: pointer;
}

.total{
    display: flex;
    justify-content: flex-end;
    margin-top: 1.5rem;
    border-top: var(--border);
    color: white;
}

.total-title{
    font-size: 1rem;
    font-weight: 600;
    color: white;
}

.cart-content{
    color: white;
}

.total-price{
    margin-left: 0.5rem;
    color: var(--main-color);
}

.btn-buy{
    margin-left: 35%;
}

#close-cart{
    position: absolute;
    top: 1rem;
    right: 0.8rem;
    font-size: 2rem;
    color: white;
    cursor: pointer;
    transition: 1s ease;
}

#close-cart:hover{
    cursor: pointer;
}
    </style>
</head>
<body>

<section class="shop container">
    <div class="section-title" id="Software">
        <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Productos</h4>
        <h1 class="display-4">Adquiere Nuestros Productos</h1>
    </div>

    <div class="shop-content">
    <?php
// Aquí deberías conectar a tu base de datos para obtener los productos
include "conexion.php"; // Asegúrate de que este archivo esté configurado correctamente

$query = "SELECT * FROM productos";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    while ($producto = mysqli_fetch_assoc($result)) {
        echo "<div class='product-box'>";
        echo "<i class='fas fa-shopping-cart add-cart' onclick='agregarAlCarrito({$producto['id_producto']})'></i>";
        
        // Aquí se muestra correctamente la imagen
        echo "<img src='../../cafecito/login/dashboard/".htmlspecialchars($producto['imagen'])."' alt='Imagen de {$producto['nombre']}' class='product-img'>";
        
        echo "<h2 class='product-title'>".htmlspecialchars($producto['nombre'])."</h2>";
        echo "<span class='price'>\$".htmlspecialchars($producto['precio'])."</span>"; // Asegúrate de que el campo 'precio' exista en tu tabla
        echo "</div>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

    </div>
</section>

</body>
</html>
