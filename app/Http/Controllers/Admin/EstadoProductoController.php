<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EstadoProducto\BulkDestroyEstadoProducto;
use App\Http\Requests\Admin\EstadoProducto\DestroyEstadoProducto;
use App\Http\Requests\Admin\EstadoProducto\IndexEstadoProducto;
use App\Http\Requests\Admin\EstadoProducto\StoreEstadoProducto;
use App\Http\Requests\Admin\EstadoProducto\UpdateEstadoProducto;
use App\Models\EstadoProducto;
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

class EstadoProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEstadoProducto $request
     * @return array|Factory|View
     */
    public function index(IndexEstadoProducto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EstadoProducto::class)->processRequestAndGet(
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

        return view('admin.estado-producto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.estado-producto.create');

        return view('admin.estado-producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstadoProducto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEstadoProducto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EstadoProducto
        $estadoProducto = EstadoProducto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/estado-productos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/estado-productos');
    }

    /**
     * Display the specified resource.
     *
     * @param EstadoProducto $estadoProducto
     * @throws AuthorizationException
     * @return void
     */
    public function show(EstadoProducto $estadoProducto)
    {
        $this->authorize('admin.estado-producto.show', $estadoProducto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EstadoProducto $estadoProducto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EstadoProducto $estadoProducto)
    {
        $this->authorize('admin.estado-producto.edit', $estadoProducto);


        return view('admin.estado-producto.edit', [
            'estadoProducto' => $estadoProducto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEstadoProducto $request
     * @param EstadoProducto $estadoProducto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEstadoProducto $request, EstadoProducto $estadoProducto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EstadoProducto
        $estadoProducto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/estado-productos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/estado-productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEstadoProducto $request
     * @param EstadoProducto $estadoProducto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEstadoProducto $request, EstadoProducto $estadoProducto)
    {
        $estadoProducto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEstadoProducto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEstadoProducto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EstadoProducto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
