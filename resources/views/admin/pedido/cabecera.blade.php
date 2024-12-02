<div class="card">
    <div class="card-header text-center">
        Pedido -
    </div>
    <h5 class="card-header text-center">
        Currículo - {{$pedido}}
    </h5>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Cliente: {{$pedido->cliente_id->cliente->nombre}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">RUC: </p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Método de Pago:}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Ciudad: </p>
            </div>
        </div>
    </div>
</div>
