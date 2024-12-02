@extends('brackets/admin-ui::admin.layout.default')


@section('content')
    <div class="container">
        <h1>Crear Pedido</h1>

        <!-- Formulario para crear el pedido -->
        <form action="{{ route('pedidos.guardar') }}" method="POST">
            @csrf

            <!-- Cabecera del pedido -->
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <input type="text" name="cliente_id" id="cliente_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <!-- Detalles del pedido -->
            <div id="detalles">
                <div class="detalle-row">
                    <div class="form-group">
                        <label for="producto_id">Producto</label>
                        <select name="detalles[0][producto_id]" class="form-control" required>
                            <option value="">Seleccionar Producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="detalles[0][cantidad]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="precio_unitario">Precio Unitario</label>
                        <input type="number" name="detalles[0][precio_unitario]" class="form-control" step="0.01" required>
                    </div>
                </div>
            </div>

            <!-- Botón para agregar más detalles -->
            <button type="button" class="btn btn-primary" id="addDetalle">Agregar Detalle</button>

            <!-- Botón para guardar -->
            <button type="submit" class="btn btn-success">Guardar Pedido</button>
        </form>
    </div>

    <script>
        let detalleIndex = 1;

        document.getElementById('addDetalle').addEventListener('click', function () {
            const detalleRow = document.createElement('div');
            detalleRow.classList.add('detalle-row');
            detalleRow.innerHTML = `
                <div class="form-group">
                    <label for="producto_id">Producto</label>
                    <select name="detalles[${detalleIndex}][producto_id]" class="form-control" required>
                        <option value="">Seleccionar Producto</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="detalles[${detalleIndex}][cantidad]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="precio_unitario">Precio Unitario</label>
                    <input type="number" name="detalles[${detalleIndex}][precio_unitario]" class="form-control" step="0.01" required>
                </div>
            `;
            document.getElementById('detalles').appendChild(detalleRow);
            detalleIndex++;
        });
    </script>
@endsection
