<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Inventario\BulkDestroyInventario;
use App\Http\Requests\Admin\Inventario\DestroyInventario;
use App\Http\Requests\Admin\Inventario\IndexInventario;
use App\Http\Requests\Admin\Inventario\StoreInventario;
use App\Http\Requests\Admin\Inventario\UpdateInventario;
use App\Models\Inventario;
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

class InventarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexInventario $request
     * @return array|Factory|View
     */
    public function index(IndexInventario $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Inventario::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'vidones_disponibles', 'vidones_recargados', 'vidones_vendidos', 'vidones_devueltos', 'fecha'],

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

        return view('admin.inventario.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.inventario.create');

        return view('admin.inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInventario $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreInventario $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Inventario
        $inventario = Inventario::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/inventarios'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/inventarios');
    }

    /**
     * Display the specified resource.
     *
     * @param Inventario $inventario
     * @throws AuthorizationException
     * @return void
     */
    public function show(Inventario $inventario)
    {
        $this->authorize('admin.inventario.show', $inventario);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Inventario $inventario
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Inventario $inventario)
    {
        $this->authorize('admin.inventario.edit', $inventario);


        return view('admin.inventario.edit', [
            'inventario' => $inventario,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInventario $request
     * @param Inventario $inventario
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateInventario $request, Inventario $inventario)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Inventario
        $inventario->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/inventarios'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/inventarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyInventario $request
     * @param Inventario $inventario
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyInventario $request, Inventario $inventario)
    {
        $inventario->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyInventario $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyInventario $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Inventario::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
