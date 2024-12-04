<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DetallePedido\BulkDestroyDetallePedido;
use App\Http\Requests\Admin\DetallePedido\DestroyDetallePedido;
use App\Http\Requests\Admin\DetallePedido\IndexDetallePedido;
use App\Http\Requests\Admin\DetallePedido\StoreDetallePedido;
use App\Http\Requests\Admin\DetallePedido\UpdateDetallePedido;
use App\Models\DetallePedido;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DetallePedidoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDetallePedido $request
     * @return array|Factory|View
     */
    public function index(IndexDetallePedido $request)
    {$pedido = Pedido::find($pedidoid);


        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(DetallePedido::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'pedido_id', 'producto_id', 'cantidad', 'precio_gral'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.detalle-pedido.index', ['data' => $data,'pedido'=>$pedido]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */

        public function create($pedidoId)
        {
            dd($pedidoId); // Esto debería mostrar el pedidoId recibido

            // Aquí puedes agregar la lógica para crear un detalle de pedido
            return view('admin.detalle-pedidos.create', compact('pedidoId'));
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDetallePedido $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDetallePedido $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the DetallePedido
        $detallePedido = DetallePedido::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/detalle-pedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/detalle-pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param DetallePedido $detallePedido
     * @throws AuthorizationException
     * @return void
     */
    public function show(DetallePedido $detallePedido)
    {
        $this->authorize('admin.detalle-pedido.show', $detallePedido);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DetallePedido $detallePedido
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(DetallePedido $detallePedido)
    {
        $this->authorize('admin.detalle-pedido.edit', $detallePedido);


        return view('admin.detalle-pedido.edit', [
            'detallePedido' => $detallePedido,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDetallePedido $request
     * @param DetallePedido $detallePedido
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDetallePedido $request, DetallePedido $detallePedido)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values DetallePedido
        $detallePedido->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/detalle-pedidos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/detalle-pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDetallePedido $request
     * @param DetallePedido $detallePedido
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDetallePedido $request, DetallePedido $detallePedido)
    {
        $detallePedido->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDetallePedido $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDetallePedido $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DetallePedido::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
