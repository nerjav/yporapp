<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vidones_disponibles'), 'has-success': fields.vidones_disponibles && fields.vidones_disponibles.valid }">
    <label for="vidones_disponibles" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.inventario.columns.vidones_disponibles') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.vidones_disponibles" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('vidones_disponibles'), 'form-control-success': fields.vidones_disponibles && fields.vidones_disponibles.valid}" id="vidones_disponibles" name="vidones_disponibles" placeholder="{{ trans('admin.inventario.columns.vidones_disponibles') }}">
        <div v-if="errors.has('vidones_disponibles')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vidones_disponibles') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vidones_recargados'), 'has-success': fields.vidones_recargados && fields.vidones_recargados.valid }">
    <label for="vidones_recargados" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.inventario.columns.vidones_recargados') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.vidones_recargados" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('vidones_recargados'), 'form-control-success': fields.vidones_recargados && fields.vidones_recargados.valid}" id="vidones_recargados" name="vidones_recargados" placeholder="{{ trans('admin.inventario.columns.vidones_recargados') }}">
        <div v-if="errors.has('vidones_recargados')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vidones_recargados') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vidones_vendidos'), 'has-success': fields.vidones_vendidos && fields.vidones_vendidos.valid }">
    <label for="vidones_vendidos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.inventario.columns.vidones_vendidos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.vidones_vendidos" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('vidones_vendidos'), 'form-control-success': fields.vidones_vendidos && fields.vidones_vendidos.valid}" id="vidones_vendidos" name="vidones_vendidos" placeholder="{{ trans('admin.inventario.columns.vidones_vendidos') }}">
        <div v-if="errors.has('vidones_vendidos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vidones_vendidos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vidones_devueltos'), 'has-success': fields.vidones_devueltos && fields.vidones_devueltos.valid }">
    <label for="vidones_devueltos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.inventario.columns.vidones_devueltos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.vidones_devueltos" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('vidones_devueltos'), 'form-control-success': fields.vidones_devueltos && fields.vidones_devueltos.valid}" id="vidones_devueltos" name="vidones_devueltos" placeholder="{{ trans('admin.inventario.columns.vidones_devueltos') }}">
        <div v-if="errors.has('vidones_devueltos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vidones_devueltos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fecha'), 'has-success': fields.fecha && fields.fecha.valid }">
    <label for="fecha" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.inventario.columns.fecha') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fecha'), 'form-control-success': fields.fecha && fields.fecha.valid}" id="fecha" name="fecha" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha') }}</div>
    </div>
</div>


