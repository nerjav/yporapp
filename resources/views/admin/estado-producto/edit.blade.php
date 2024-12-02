@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.estado-producto.actions.edit', ['name' => $estadoProducto->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <estado-producto-form
                :action="'{{ $estadoProducto->resource_url }}'"
                :data="{{ $estadoProducto->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.estado-producto.actions.edit', ['name' => $estadoProducto->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.estado-producto.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </estado-producto-form>

        </div>
    
</div>

@endsection