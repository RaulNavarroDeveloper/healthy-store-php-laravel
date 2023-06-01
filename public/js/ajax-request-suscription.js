document.getElementById('form-suscription').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir la acción por defecto del formulario
    const form = event.target;
    const url = form.action;
    // const method = form.method.toUpperCase();
    // Obtener los datos del formulario
    const formData = new FormData(this);
    const mostrarErrores =  document.querySelector('span.'+'nombre'+ '_error')
    console.log(mostrarErrores);
    // Realizar la petición AJAX al controlador
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: formData,
    })
        .then(response => response.json())
            // const res = response.json();
            // console.log(response.json())
            // console.log('aaaaaa ->:',(response)))
        .then(data => {
            console.log(data.status);
            // if(data.status === 1){
            //     const mp = new MercadoPago(publicKey, {
            //         locale: 'es-AR'
            //     });
            //     mp.checkout({
            //     preference: {
            //         id: preferenceId,
            //     },
            //     render: {
            //         container: '#mp-wrapper',
            //         label:'Pagar',
            //     }
            // });
            // }
            // console.log('aaaaa->' ,data);
            // const cantidadBotones = document.querySelectorAll('.mercadopago-button');
            // console.log(cantidadBotones.length);
            // if(data.status == 0) {
            //     console.log('errorrr', data.errors)
            //     // Object.keys(data.errors).forEach(function(prefix){
            //     //     document.querySelector('span.'+prefix+'_error').textContent = data.errors[prefix][0];
            //     // })
            //     return;
           // } else if(data.status == 1 && cantidadBotones.length === 0 ) {
            //     mp.checkout({
            //         preference: {
            //             id: preferenceId,
            //         },
            //         render: {
            //             container: '#mp-wrapper',
            //             label:'Pagar',
            //         }
            //     });
            // // }
        })
        .catch(err => {
            console.log('error->',err)
        })
});
