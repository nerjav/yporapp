<div class="card">
    <div class="card-header text-center">
        Pedido
    </div>
    <h5 class="card-header text-center">
        Currículo - {{$pedido->estadospedido}}
    </h5>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Cliente: {{$pedido->cliente->nombre}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">RUC:{{$pedido->cliente->ruc}} </p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Método de Pago:{{$pedido->metododepago->nombre}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Tipo de Cliente:{{$pedido->tipodecliente->nombre}} </p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Estados Pedido:{{$pedido->estadospedido->nombre}} </p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Estado del Pedido:{{$pedido->estadospedido->nombre}} </p>
            </div>

              <div class="form-group col-sm-4">
                <p class="card-text">Observacion{{$pedido->metododepago->descripcion}} </p>
            </div>
        </div>
    </div>
</div>
