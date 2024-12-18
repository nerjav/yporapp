@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.productos-force.actions.edit', ['name' => $productosForce->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <productos-force-form
                :action="'{{ $productosForce->resource_url }}'"
                :data="{{ $productosForce->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.productos-force.actions.edit', ['name' => $productosForce->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.productos-force.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </productos-force-form>

        </div>
    
</div>

@endsection