'use strict';
let divAlerta = document.querySelector('.div-alerta');
let cerrarAlerta = document.querySelector('.div-alerta i');

function eliminar () {
    divAlerta.remove();
}
cerrarAlerta.addEventListener('click', e => {
    divAlerta.classList.replace('animate__fadeInDown', 'animate__fadeOutUp')
    setTimeout(eliminar, 800);
})
