<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/clientes') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.cliente.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/inventarios') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.inventario.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/productos') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.producto.title') }}</a></li>
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/productos-forces') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.productos-force.title') }}</a></li> --}}
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/vestados-pedidos') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.estados-pedido.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-de-clientes') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.tipo-de-cliente.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/pedidos') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.pedido.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ventas') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.venta.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/detalle-pedidos') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.detalle-pedido.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/metodos-de-pagos') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.metodos-de-pago.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/estados-pedidos') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.estados-pedido.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/estado-productos') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.estado-producto.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
