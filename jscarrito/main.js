let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart');
let closeCart = document.querySelector('#close-cart');

cartIcon.onclick = () => {
    cart.classList.add('active');
}
closeCart.onclick = () => {
    cart.classList.remove('active');
}

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {
    updateRemoveCartButtons();

    var quantityInputs = document.getElementsByClassName('cart-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    var addCartButtons = document.getElementsByClassName('add-cart');
    for (var i = 0; i < addCartButtons.length; i++) {
        var button = addCartButtons[i];
        button.addEventListener('click', addCartClicked);
    }

    document.getElementsByClassName('btn-buy')[0].addEventListener('click', buyButtonClicked);
}

function buyButtonClicked() {
    alert('Su pedido ha sido realizado');
    var cartContent = document.getElementsByClassName('cart-content')[0];
    while (cartContent.hasChildNodes()) {
        cartContent.removeChild(cartContent.firstChild);
    }
    updatetotal();
    updateCartItemCount();
}

function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove(); // Elimina el elemento del carrito
    updatetotal();
    updateCartItemCount();
}

function addCartClicked(event) {
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
    var price = shopProducts.getElementsByClassName('price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
    addProductToCart(title, price, productImg);
    updatetotal();
    updateCartItemCount();
}

function addProductToCart(title, price, productImg) {
    var cartContent = document.querySelector('.cart-content');
    var cartItemsNames = cartContent.getElementsByClassName('cart-product-title');

    for (let name of cartItemsNames) {
        if (name.innerText === title) {
            alert('Este producto ya está en el carrito');
            return;
        }
    }

    var cartShopBox = document.createElement('div');
    cartShopBox.classList.add('cart-box');

    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <button class="cart-remove">Eliminar</button>`; // Botón de eliminar

    cartShopBox.innerHTML = cartBoxContent;
    cartContent.appendChild(cartShopBox);

    updateRemoveCartButtons();
    cartShopBox.querySelector('.cart-quantity').addEventListener('change', quantityChanged);

    updateCartItemCount();
}

function updateRemoveCartButtons() {
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    for (let button of removeCartButtons) {
        button.addEventListener('click', removeCartItem); // Asegurarse de que el botón funcione
    }
}

function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updatetotal();
}

function updatetotal() {
    var cartContent = document.getElementsByClassName('cart-content')[0];
    var cartBoxes = cartContent.getElementsByClassName('cart-box');
    var total = 0;

    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace(/[^\d.-]/g, ""));
        var quantity = quantityElement.value;
        total += price * quantity;
    }

    // Asegurar que el total tenga tres decimales
    total = Math.round(total * 1000) / 1000;

    // Formatear el total con tres decimales
    var formattedTotal = new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 3,
        maximumFractionDigits: 3
    }).format(total);

    document.getElementsByClassName('total-price')[0].innerText = formattedTotal;
}

function updateCartItemCount() {
    var cartContent = document.getElementsByClassName('cart-content')[0];
    var cartBoxes = cartContent.getElementsByClassName('cart-box');
    document.getElementById('cart-item-count').innerText = cartBoxes.length;
}
