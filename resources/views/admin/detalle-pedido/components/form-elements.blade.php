<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pedido_id'), 'has-success': fields.pedido_id && fields.pedido_id.valid }">
    <label for="pedido_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalle-pedido.columns.pedido_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pedido_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pedido_id'), 'form-control-success': fields.pedido_id && fields.pedido_id.valid}" id="pedido_id" name="pedido_id" placeholder="{{ trans('admin.detalle-pedido.columns.pedido_id') }}">
        <div v-if="errors.has('pedido_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pedido_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('producto_id'), 'has-success': fields.producto_id && fields.producto_id.valid }">
    <label for="producto_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalle-pedido.columns.producto_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.producto_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('producto_id'), 'form-control-success': fields.producto_id && fields.producto_id.valid}" id="producto_id" name="producto_id" placeholder="{{ trans('admin.detalle-pedido.columns.producto_id') }}">
        <div v-if="errors.has('producto_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('producto_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cantidad'), 'has-success': fields.cantidad && fields.cantidad.valid }">
    <label for="cantidad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalle-pedido.columns.cantidad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cantidad'), 'form-control-success': fields.cantidad && fields.cantidad.valid}" id="cantidad" name="cantidad" placeholder="{{ trans('admin.detalle-pedido.columns.cantidad') }}">
        <div v-if="errors.has('cantidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('precio_gral'), 'has-success': fields.precio_gral && fields.precio_gral.valid }">
    <label for="precio_gral" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalle-pedido.columns.precio_gral') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.precio_gral" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('precio_gral'), 'form-control-success': fields.precio_gral && fields.precio_gral.valid}" id="precio_gral" name="precio_gral" placeholder="{{ trans('admin.detalle-pedido.columns.precio_gral') }}">
        <div v-if="errors.has('precio_gral')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('precio_gral') }}</div>
    </div>
</div>


