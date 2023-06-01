@extends("layouts.main")
@section("title", "Modificar o cancelar Suscripción")

@section("main")
    <div class="text-center mt-5">
        <h1>Es triste que te vayas :(</h1>
    </div>
    <div class="w-75 m-auto mt-5">
        <h2>¿Cuál es la razón principal de cancelación?</h2>
        <form action="{{route('suscripcion.cancelar.ejecutar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="radio" name="motivo" value="precio" id="Muy caro">
                <label for="precio">Muy caro</label>
            </div>
            <div>
                <input type="radio" name="motivo" value="No me gustó el servicio" id="servicio-malo">
                <label for="servicio-malo">No me gustó el servicio</label>
            </div>
            <div>
                <input type="radio" name="motivo" value="No era lo que esperaba" id="diferente-esperado">
                <label for="diferente-esperado">No era lo que esperaba</label>
            </div>
            <div>
                <input type="radio" name="motivo" value="Tiempos de envío" id="tiempo-envio">
                <label for="tiempo-envio">Tiempos de envío</label>
            </div>
            <button type="submit" class="mt-4 btn btn-danger">Cancelar Suscripción</button>
        </form>
    </div>
@endsection
