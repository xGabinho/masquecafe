let userIcon = document.getElementById('user-icon');
let userMenu = document.getElementById('user-menu');

// Mostrar el menú cuando se pasa el mouse por el ícono o el menú
userIcon.onmouseover = () => {
    userMenu.style.display = 'block'; // Mostrar menú
};

userMenu.onmouseover = () => {
    userMenu.style.display = 'block'; // Mantener el menú visible al pasar el mouse
};

// Ocultar el menú cuando el mouse sale de ambos
userIcon.onmouseout = () => {
    if (!userMenu.matches(':hover')) {
        userMenu.style.display = 'none'; // Ocultar menú si el mouse no está en el menú
    }
};

userMenu.onmouseout = () => {
    userMenu.style.display = 'none'; // Ocultar menú al salir del menú
};

