@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.detalle-pedido.actions.edit', ['name' => $detallePedido->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <detalle-pedido-form
                :action="'{{ $detallePedido->resource_url }}'"
                :data="{{ $detallePedido->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.detalle-pedido.actions.edit', ['name' => $detallePedido->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.detalle-pedido.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </detalle-pedido-form>

        </div>
    
</div>

@endsection