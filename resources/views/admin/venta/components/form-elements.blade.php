<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_id'), 'has-success': fields.cliente_id && fields.cliente_id.valid }">
    <label for="cliente_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.cliente_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_id'), 'form-control-success': fields.cliente_id && fields.cliente_id.valid}" id="cliente_id" name="cliente_id" placeholder="{{ trans('admin.venta.columns.cliente_id') }}">
        <div v-if="errors.has('cliente_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('total_vidones'), 'has-success': fields.total_vidones && fields.total_vidones.valid }">
    <label for="total_vidones" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.total_vidones') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.total_vidones" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('total_vidones'), 'form-control-success': fields.total_vidones && fields.total_vidones.valid}" id="total_vidones" name="total_vidones" placeholder="{{ trans('admin.venta.columns.total_vidones') }}">
        <div v-if="errors.has('total_vidones')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('total_vidones') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('monto_total'), 'has-success': fields.monto_total && fields.monto_total.valid }">
    <label for="monto_total" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.monto_total') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.monto_total" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('monto_total'), 'form-control-success': fields.monto_total && fields.monto_total.valid}" id="monto_total" name="monto_total" placeholder="{{ trans('admin.venta.columns.monto_total') }}">
        <div v-if="errors.has('monto_total')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('monto_total') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('metodo_pago'), 'has-success': fields.metodo_pago && fields.metodo_pago.valid }">
    <label for="metodo_pago" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.metodo_pago') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.metodo_pago" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('metodo_pago'), 'form-control-success': fields.metodo_pago && fields.metodo_pago.valid}" id="metodo_pago" name="metodo_pago" placeholder="{{ trans('admin.venta.columns.metodo_pago') }}">
        <div v-if="errors.has('metodo_pago')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('metodo_pago') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('monto_abonado'), 'has-success': fields.monto_abonado && fields.monto_abonado.valid }">
    <label for="monto_abonado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.monto_abonado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.monto_abonado" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('monto_abonado'), 'form-control-success': fields.monto_abonado && fields.monto_abonado.valid}" id="monto_abonado" name="monto_abonado" placeholder="{{ trans('admin.venta.columns.monto_abonado') }}">
        <div v-if="errors.has('monto_abonado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('monto_abonado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fecha_venta'), 'has-success': fields.fecha_venta && fields.fecha_venta.valid }">
    <label for="fecha_venta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.fecha_venta') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha_venta" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fecha_venta'), 'form-control-success': fields.fecha_venta && fields.fecha_venta.valid}" id="fecha_venta" name="fecha_venta" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha_venta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha_venta') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado_venta'), 'has-success': fields.estado_venta && fields.estado_venta.valid }">
    <label for="estado_venta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.estado_venta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado_venta" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado_venta'), 'form-control-success': fields.estado_venta && fields.estado_venta.valid}" id="estado_venta" name="estado_venta" placeholder="{{ trans('admin.venta.columns.estado_venta') }}">
        <div v-if="errors.has('estado_venta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado_venta') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observaciones'), 'has-success': fields.observaciones && fields.observaciones.valid }">
    <label for="observaciones" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.venta.columns.observaciones') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.observaciones" v-validate="''" id="observaciones" name="observaciones"></textarea>
        </div>
        <div v-if="errors.has('observaciones')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observaciones') }}</div>
    </div>
</div>


