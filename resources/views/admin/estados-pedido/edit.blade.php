@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.estados-pedido.actions.edit', ['name' => $estadosPedido->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <estados-pedido-form
                :action="'{{ $estadosPedido->resource_url }}'"
                :data="{{ $estadosPedido->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.estados-pedido.actions.edit', ['name' => $estadosPedido->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.estados-pedido.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </estados-pedido-form>

        </div>
    
</div>

@endsection