'use strict'
let passwordInput = document.querySelector('#password');
let iconoVisibilidad = document.querySelector('#eye-icon');

function toggleIcon () {
    if(passwordInput.type == 'password'){
        passwordInput.type = 'text';
        iconoVisibilidad.className = 'fa-regular fa-eye-slash fs-4';
    } else {
        passwordInput.type = 'password';
        iconoVisibilidad.className = 'fa-regular fa-eye fs-4';
    }
}
iconoVisibilidad.addEventListener('click', toggleIcon);

