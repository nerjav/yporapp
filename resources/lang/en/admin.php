<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'fecha_registro' => 'Fecha registro',
            
        ],
    ],

    'inventario' => [
        'title' => 'Inventario',

        'actions' => [
            'index' => 'Inventario',
            'create' => 'New Inventario',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'inventario' => [
        'title' => 'Inventario',

        'actions' => [
            'index' => 'Inventario',
            'create' => 'New Inventario',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'vidones_disponibles' => 'Vidones disponibles',
            'vidones_recargados' => 'Vidones recargados',
            'vidones_vendidos' => 'Vidones vendidos',
            'vidones_devueltos' => 'Vidones devueltos',
            'fecha' => 'Fecha',
            
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'productos-force' => [
        'title' => 'Productos-Force',

        'actions' => [
            'index' => 'Productos-Force',
            'create' => 'New Productos-Force',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'stock_inicial' => 'Stock inicial',
            'stock_actual' => 'Stock actual',
            'unidad' => 'Unidad',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'ruc' => 'Ruc',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'fecha_registro' => 'Fecha registro',
            
        ],
    ],

    'estados-pedido' => [
        'title' => 'Estados Pedidos',

        'actions' => [
            'index' => 'Estados Pedidos',
            'create' => 'New Estados Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'estados-pedido' => [
        'title' => 'Estados Pedidos',

        'actions' => [
            'index' => 'Estados Pedidos',
            'create' => 'New Estados Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'tipo-de-cliente' => [
        'title' => 'Tipo De Clientes',

        'actions' => [
            'index' => 'Tipo De Clientes',
            'create' => 'New Tipo De Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_pedido' => 'Id pedido',
            'cliente_id' => 'Cliente',
            'fecha_pedido' => 'Fecha pedido',
            'cantidad_vidones' => 'Cantidad vidones',
            'estado_id' => 'Estado',
            'total' => 'Total',
            
        ],
    ],

    'tipo-de-cliente' => [
        'title' => 'Tipo De Clientes',

        'actions' => [
            'index' => 'Tipo De Clientes',
            'create' => 'New Tipo De Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'venta' => [
        'title' => 'Ventas',

        'actions' => [
            'index' => 'Ventas',
            'create' => 'New Venta',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'total_vidones' => 'Total vidones',
            'monto_total' => 'Monto total',
            'metodo_pago' => 'Metodo pago',
            'monto_abonado' => 'Monto abonado',
            'fecha_venta' => 'Fecha venta',
            'estado_venta' => 'Estado venta',
            'observaciones' => 'Observaciones',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'producto_id' => 'Producto',
            'fecha_pedido' => 'Fecha pedido',
            'estado_id' => 'Estado',
            'metodo_pago_id' => 'Metodo pago',
            'cantidad' => 'Cantidad',
            'precio_unitario' => 'Precio unitario',
            'total' => 'Total',
            'observacion' => 'Observacion',
            
        ],
    ],

    'detalle-pedido' => [
        'title' => 'Detalle Pedido',

        'actions' => [
            'index' => 'Detalle Pedido',
            'create' => 'New Detalle Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'pedido_id' => 'Pedido',
            'producto_id' => 'Producto',
            'cantidad' => 'Cantidad',
            'precio_unitario' => 'Precio unitario',
            'precio_total' => 'Precio total',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'fecha_pedido' => 'Fecha pedido',
            'estado_id' => 'Estado',
            'metodo_pago_id' => 'Metodo pago',
            'total' => 'Total',
            'observacion' => 'Observacion',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'ruc' => 'Ruc',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'fecha_registro' => 'Fecha registro',
            
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'precio_unitario' => 'Precio unitario',
            'stock_actual' => 'Stock actual',
            
        ],
    ],

    'detalle-pedido' => [
        'title' => 'Detalle Pedido',

        'actions' => [
            'index' => 'Detalle Pedido',
            'create' => 'New Detalle Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'pedido_id' => 'Pedido',
            'producto_id' => 'Producto',
            'cantidad' => 'Cantidad',
            'precio_gral' => 'Precio gral',
            
        ],
    ],

    'tipo-de-cliente' => [
        'title' => 'Tipo De Clientes',

        'actions' => [
            'index' => 'Tipo De Clientes',
            'create' => 'New Tipo De Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'metodos-de-pago' => [
        'title' => 'Metodos De Pagos',

        'actions' => [
            'index' => 'Metodos De Pagos',
            'create' => 'New Metodos De Pago',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            
        ],
    ],

    'estados-pedido' => [
        'title' => 'Estados Pedidos',

        'actions' => [
            'index' => 'Estados Pedidos',
            'create' => 'New Estados Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'estado-producto' => [
        'title' => 'Estado Producto',

        'actions' => [
            'index' => 'Estado Producto',
            'create' => 'New Estado Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'fecha_pedido' => 'Fecha pedido',
            'estado_id' => 'Estado',
            'metodo_pago_id' => 'Metodo pago',
            'total' => 'Total',
            'observacion' => 'Observacion',
            'cliente_id' => 'Cliente',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'fecha_pedido' => 'Fecha pedido',
            'estado_id' => 'Estado',
            'tipo_cliente_id' => 'Tipo cliente',
            'metodo_pago_id' => 'Metodo pago',
            'total' => 'Total',
            'observacion' => 'Observacion',
            'cliente_id' => 'Cliente',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];