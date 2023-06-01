<div class="modal fade" id="modalSuscripcion" tabindex="-1" aria-labelledby="modal-suscripcion" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-contenido">
            <div class="modal-header ms-2 mt-2">
                <h1 class="h3 abs" id="exampleModalLabel">Información de tu suscripción</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="h5 text-secondary">Plan actual:</h2>
                <div class="m-75 m-auto d-flex">
                    <div class="w-50 d-flex align-items-center mt-3 ms-3">
                        <h3 class="h2 me-4">{{$suscripcionActiva->tipo_suscripcion}}</h3>
                        <p class="fw-bold span-modal-precio px-3 py-2 m-0">${{ $suscripcionActiva->{'precio_' . strtolower($suscripcionActiva->tipo_suscripcion)} }}/ mes</p>
                    </div>
                    <div class="w-50 d-flex flex-column align-items-end me-2">
                        <a type="submit" class="btn btn-primary w-50">Mejorar Plan</a>
                        <a class="btn btn-danger w-50 mt-4" href="{{route('suscripcion.baja')}}">Cancelar Plan</a>
                    </div>
                </div>
                <div class="mt-3">
                    <h2 class="h5 text-secondary">Status</h2>
                    <p class="bold-not-as-dark">Activo</p>
                    <p>Miembro desde <span class="fw-bold">{{$suscripcionActiva->fecha_suscripcion}}</span></p>
                    <p>Renovación de la suscripción en <span class="fw-bold">{{$suscripcionActiva->fecha_finalizacion}}</span></p>
                </div>
                <div class="mt-3">
                    <h2 class="h5 text-secondary">Método de Pago</h2>
                    <div class="d-flex justify-content-between align-items-center">
                        <p><i class='bx bx-credit-card-alt'></i> **** 4562</p>
                    <a href="#" class="text-decoration-none">Cambiar tarjeta de crédito</a>
                    </div>
                </div>
            </div>
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>--}}
{{--                <button type="button" class="btn btn-primary">Guardar Cambios</button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
