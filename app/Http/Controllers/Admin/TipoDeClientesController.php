<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TipoDeCliente\BulkDestroyTipoDeCliente;
use App\Http\Requests\Admin\TipoDeCliente\DestroyTipoDeCliente;
use App\Http\Requests\Admin\TipoDeCliente\IndexTipoDeCliente;
use App\Http\Requests\Admin\TipoDeCliente\StoreTipoDeCliente;
use App\Http\Requests\Admin\TipoDeCliente\UpdateTipoDeCliente;
use App\Models\TipoDeCliente;
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

class TipoDeClientesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTipoDeCliente $request
     * @return array|Factory|View
     */
    public function index(IndexTipoDeCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TipoDeCliente::class)->processRequestAndGet(
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

        return view('admin.tipo-de-cliente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tipo-de-cliente.create');

        return view('admin.tipo-de-cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTipoDeCliente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTipoDeCliente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TipoDeCliente
        $tipoDeCliente = TipoDeCliente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tipo-de-clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tipo-de-clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param TipoDeCliente $tipoDeCliente
     * @throws AuthorizationException
     * @return void
     */
    public function show(TipoDeCliente $tipoDeCliente)
    {
        $this->authorize('admin.tipo-de-cliente.show', $tipoDeCliente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TipoDeCliente $tipoDeCliente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TipoDeCliente $tipoDeCliente)
    {
        $this->authorize('admin.tipo-de-cliente.edit', $tipoDeCliente);


        return view('admin.tipo-de-cliente.edit', [
            'tipoDeCliente' => $tipoDeCliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTipoDeCliente $request
     * @param TipoDeCliente $tipoDeCliente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTipoDeCliente $request, TipoDeCliente $tipoDeCliente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TipoDeCliente
        $tipoDeCliente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tipo-de-clientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tipo-de-clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTipoDeCliente $request
     * @param TipoDeCliente $tipoDeCliente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTipoDeCliente $request, TipoDeCliente $tipoDeCliente)
    {
        $tipoDeCliente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTipoDeCliente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTipoDeCliente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TipoDeCliente::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
