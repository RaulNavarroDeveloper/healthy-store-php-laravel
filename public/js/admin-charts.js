const ctx1 = document.getElementById('chartIngresoPorSuscripcion');
const ctx2 = document.getElementById('chartIngresosPorMes');
const ctx3 = document.getElementById('chartSuscriptoresPorMes');
const ctx4 = document.getElementById('chartSuscriptoresTemporalidad');
new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: nombresSuscripcion,
        datasets: [{
            label: 'Ingresos Por Suscripción',
            data: dataIngresosPorSuscripcion,
            borderWidth: 1
        }]
    },
});

new Chart(ctx2, {
    type: 'line',
    data: {
        labels: mesesIngresos,
        datasets: [{
            label: 'Ingresos Mensuales',
            data: ingresosPorMes,
            borderWidth: 1
        }]
    },
    options: {
            tension: 0.5,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
    },
});
new Chart(ctx3, {
    type: 'line',
    data: {
        labels: mesesSuscripciones,
        datasets: [{
            label: 'Suscriptores Mensuales',
            data: suscriptoresPorMes,
            borderWidth: 1
        }]
    },
    options: {
        tension: 0.5,
        scales: {
            y: { // defining min and max so hiding the dataset does not change scale range
                beginAtZero: true
            }
         }
    },
});
new Chart(ctx4, {
    type: 'doughnut',
    data: {
        labels: tipoSuscripciones,
        datasets: [{
            label: 'Suscriptores por temporalidad',
            data: suscripcionPorTemporalidad,
            borderWidth: 1
        }]
    },
    // options: {
    //     tension: 0.5,
    //     scales: {
    //         // y: { // defining min and max so hiding the dataset does not change scale range
    //         //     beginAtZero: true
    //         // }
    //     }
    // },
});

