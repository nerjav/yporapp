<div class="form-group row">
    <!-- Campo RUC -->
    <div class="col-md-4">
        <label for="ruc" class="col-form-label">RUC</label>
        <input type="text" @change="findData"
            v-model="form.ruc"

            class="form-control"
            id="ruc"
            name="ruc"
            placeholder="Ingrese el RUC">
    </div>

    <!-- Campo nombre_cliente -->
    <div class="col-md-4">
        <label for="nombre" class="col-form-label">Nombre del Cliente</label>
        <input type="text"
            v-model="form.nombre"
            class="form-control"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Cliente"
            readonly>
    </div>
</div>

<div class="form-group row">
    <!-- Campo cliente_id -->
    <div class="col-md-4">
        <label for="cliente_id" class="col-form-label">{{ trans('admin.pedido.columns.cliente_id') }}</label>
        <input type="text"
            v-model="form.cliente_id"
            v-validate="'required'"
            @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('cliente_id'), 'form-control-success': fields.cliente_id && fields.cliente_id.valid}"
            id="cliente_id"
            name="cliente_id"
            placeholder="Seleccione un cliente">
        <div v-if="errors.has('cliente_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('cliente_id') }}
        </div>
    </div>

    <!-- Campo estado_id -->
    <div class="col-md-4">
        <label for="estado_id" class="col-form-label">{{ trans('admin.pedido.columns.estado_id') }}</label>
        <multiselect
            v-model="form.estado"
            :options="estado"
            :multiple="false"
            track-by="id"
            label="nombre"
            :taggable="true"
            tag-placeholder="Seleccione un estado"
            placeholder="Seleccione un estado">
        </multiselect>
        <div v-if="errors.has('estado_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('estado_id') }}
        </div>
    </div>

    <!-- Campo metodo_pago_id -->
    <div class="col-md-4">
        <label for="metodo_pago_id" class="col-form-label">{{ trans('admin.pedido.columns.metodo_pago_id') }}</label>
        <multiselect
            v-model="form.metodo_pago"
            :options="metodo_pago"
            :multiple="false"
            track-by="id"
            label="nombre"
            :taggable="true"
            tag-placeholder="Seleccione un método de pago"
            placeholder="Seleccione un método de pago">
        </multiselect>
        <div v-if="errors.has('metodo_pago_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('metodo_pago_id') }}
        </div>
    </div>
</div>

<div class="form-group row">
    <!-- Campo tipo_cliente_id -->
    <div class="col-md-4">
        <label for="tipo_cliente_id" class="col-form-label">{{ trans('admin.pedido.columns.tipo_cliente_id') }}</label>
        <multiselect
            v-model="form.tipo_cliente"
            :options="tipo_cliente"
            :multiple="false"
            track-by="id"
            label="nombre"
            :taggable="true"
            tag-placeholder="Seleccione un tipo de cliente"
            placeholder="Seleccione un tipo de cliente">
        </multiselect>
        <div v-if="errors.has('tipo_cliente_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('tipo_cliente_id') }}
        </div>
    </div>

    <!-- Campo fecha_pedido -->
    <div class="col-md-4">
        <label for="fecha_pedido" class="col-form-label">{{ trans('admin.pedido.columns.fecha_pedido') }}</label>
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha_pedido" :config="datePickerConfig"
                v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'"
                class="flatpickr"
                :class="{'form-control-danger': errors.has('fecha_pedido'), 'form-control-success': fields.fecha_pedido && fields.fecha_pedido.valid}"
                id="fecha_pedido"
                name="fecha_pedido"
                placeholder="Seleccione una fecha">
            </datetime>
        </div>
        <div v-if="errors.has('fecha_pedido')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('fecha_pedido') }}
        </div>
    </div>

    <!-- Campo observacion -->
    <div class="col-md-4">
        <label for="observacion" class="col-form-label">{{ trans('admin.pedido.columns.observacion') }}</label>
        <textarea class="form-control"
            v-model="form.observacion"
            v-validate="''"
            id="observacion"
            name="observacion"
            placeholder="Ingrese una observación"></textarea>
        <div v-if="errors.has('observacion')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('observacion') }}
        </div>
    </div>
</div>
