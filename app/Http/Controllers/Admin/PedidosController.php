<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pedido\BulkDestroyPedido;
use App\Http\Requests\Admin\Pedido\DestroyPedido;
use App\Http\Requests\Admin\Pedido\IndexPedido;
use App\Http\Requests\Admin\Pedido\StorePedido;
use App\Http\Requests\Admin\Pedido\UpdatePedido;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Producto;
use App\Http\Requests\Admin\DetallePedido\BulkDestroyDetallePedido;
use App\Http\Requests\Admin\DetallePedido\DestroyDetallePedido;
use App\Http\Requests\Admin\DetallePedido\IndexDetallePedido;
use App\Http\Requests\Admin\DetallePedido\StoreDetallePedido;
use App\Http\Requests\Admin\DetallePedido\UpdateDetallePedido;

use App\Models\MetodosDePago;
use App\Models\EstadosPedido;
use App\Models\TipoDeCliente;
use App\Models\Cliente;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PedidosController extends Controller
{
    public function index(IndexPedido $request)
    {
        $data = AdminListing::create(Pedido::class)->processRequestAndGet(
            $request,
            ['id', 'fecha_pedido', 'estado_id', 'tipo_cliente_id', 'metodo_pago_id', 'cliente_id'],
            ['id', 'observacion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return ['bulkItems' => $data->pluck('id')];
            }
            return ['data' => $data];
        }

        return view('admin.pedido.index', ['data' => $data]);
    }

    public function create()
    {
        $this->authorize('admin.pedido.create');

        $metodo_pago = MetodosDePago::all();
        $tipo_cliente = TipoDeCliente::all();
        $estado = EstadosPedido::all();

        return view('admin.pedido.create', compact('metodo_pago', 'estado', 'tipo_cliente'));
    }

    public function store(StorePedido $request)
    {
        $sanitized = $request->getSanitized();

        $sanitized['metodo_pago_id'] = $request->getmetodopagodId();
        $sanitized['estado_id'] = $request->getestadopedidodId();
        $sanitized['tipo_cliente_id'] = $request->gettipodeclienteId();


        $pedido = Pedido::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pedidos');
    }

    public function show(Pedido $pedido)
    {
        $this->authorize('admin.pedido.show', $pedido);
    }

    public function edit(Pedido $pedido)
    {
        $this->authorize('admin.pedido.edit', $pedido);

        return view('admin.pedido.edit', ['pedido' => $pedido]);
    }

    public function update(UpdatePedido $request, Pedido $pedido)
    {
        $sanitized = $request->getSanitized();
        $pedido->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pedidos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pedidos');
    }

    public function destroy(DestroyPedido $request, Pedido $pedido)
    {
        $pedido->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    public function bulkDestroy(BulkDestroyPedido $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Pedido::whereIn('id', $bulkChunk)->delete();
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }



    public function ruc($ruc)
{
    $cliente = Cliente::where('ruc', $ruc)->first();

    if ($cliente) {
        return response()->json([
            'error' => false,
            'cliente' => [
                'id' => $cliente->id,
                'ruc' => $cliente->ruc,
                'nombre' => $cliente->nombre, // Asegúrate de que 'nombre' existe en tu modelo Cliente
            ]
        ]);
    } else {
        return response()->json([
            'error' => true,
            'message' => 'RUC no encontrado'
        ]);
    }
}

public function cabecera(Pedido $pedido, IndexDetallePedido $request)
{
    // $pedido = Pedido::find($pedidoid);
    $id=$pedido->id;


    $data = AdminListing::create(DetallePedido::class)->processRequestAndGet(
        $request,
        ['id', 'pedido_id', 'producto_id', 'cantidad', 'precio_gral'],
        ['id'],
        function ($query) use ($id) {
            $query->where('detalle_pedido.pedido_id', $id);
        }
    );

    // Renderiza la vista con la cabecera y los detalles
    return view('admin.pedido.pedido', compact('pedido', 'data'));
}

    public function createdetail($id)
        {
            $this->authorize('admin.detalle-pedido.create');

            return view('admin.detalle-pedido.create', compact('id'));
        }




}
