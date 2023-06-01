const radioMensual = document.querySelector('#radioMensual');
const radioAnual = document.querySelector('#radioAnual');
const divMensual = document.querySelector('#div-suscripcion-mensual');
const divAnual = document.querySelector('#div-suscripcion-anual');
// radioMensual.defaultChecked = true;
console.log(radioMensual)
radioAnual.checked == true ? divAnual.classList.add("seleccionado") : "";
radioMensual.checked == true ? divMensual.classList.add("seleccionado") : "";

divAnual.addEventListener('click', e => {
    console.log('click anual')
    radioAnual.checked = true;
    // radioAnual.checked == false ? divAnual.classList.add("seleccionado") : "";
    divAnual.classList.add("seleccionado")
    divMensual.classList.remove("seleccionado")
})

divMensual.addEventListener('click', e => {
    console.log('click mensual')
    radioMensual.checked = true;
    divMensual.classList.add("seleccionado")
    divAnual.classList.remove("seleccionado")
})

// radioMensual.addEventListener('change', e => {
//     divMensual.classList.toggle("seleccionado")
// })
//
// radioAnual.addEventListener('change', e => {
//     divAnual.classList.toggle("seleccionado")
// })

