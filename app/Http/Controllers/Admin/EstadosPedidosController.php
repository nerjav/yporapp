<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EstadosPedido\BulkDestroyEstadosPedido;
use App\Http\Requests\Admin\EstadosPedido\DestroyEstadosPedido;
use App\Http\Requests\Admin\EstadosPedido\IndexEstadosPedido;
use App\Http\Requests\Admin\EstadosPedido\StoreEstadosPedido;
use App\Http\Requests\Admin\EstadosPedido\UpdateEstadosPedido;
use App\Models\EstadosPedido;
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

class EstadosPedidosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEstadosPedido $request
     * @return array|Factory|View
     */
    public function index(IndexEstadosPedido $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EstadosPedido::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.estados-pedido.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.estados-pedido.create');

        return view('admin.estados-pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstadosPedido $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEstadosPedido $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EstadosPedido
        $estadosPedido = EstadosPedido::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/estados-pedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/estados-pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param EstadosPedido $estadosPedido
     * @throws AuthorizationException
     * @return void
     */
    public function show(EstadosPedido $estadosPedido)
    {
        $this->authorize('admin.estados-pedido.show', $estadosPedido);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EstadosPedido $estadosPedido
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EstadosPedido $estadosPedido)
    {
        $this->authorize('admin.estados-pedido.edit', $estadosPedido);


        return view('admin.estados-pedido.edit', [
            'estadosPedido' => $estadosPedido,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEstadosPedido $request
     * @param EstadosPedido $estadosPedido
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEstadosPedido $request, EstadosPedido $estadosPedido)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EstadosPedido
        $estadosPedido->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/estados-pedidos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/estados-pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEstadosPedido $request
     * @param EstadosPedido $estadosPedido
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEstadosPedido $request, EstadosPedido $estadosPedido)
    {
        $estadosPedido->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEstadosPedido $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEstadosPedido $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EstadosPedido::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
