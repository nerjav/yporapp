<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Venta\BulkDestroyVenta;
use App\Http\Requests\Admin\Venta\DestroyVenta;
use App\Http\Requests\Admin\Venta\IndexVenta;
use App\Http\Requests\Admin\Venta\StoreVenta;
use App\Http\Requests\Admin\Venta\UpdateVenta;
use App\Models\Venta;
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

class VentasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexVenta $request
     * @return array|Factory|View
     */
    public function index(IndexVenta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Venta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'cliente_id', 'total_vidones', 'monto_total', 'metodo_pago', 'monto_abonado', 'fecha_venta', 'estado_venta'],

            // set columns to searchIn
            ['id', 'metodo_pago', 'estado_venta', 'observaciones']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.venta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.venta.create');

        return view('admin.venta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVenta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreVenta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Venta
        $ventum = Venta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ventas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param Venta $ventum
     * @throws AuthorizationException
     * @return void
     */
    public function show(Venta $ventum)
    {
        $this->authorize('admin.venta.show', $ventum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Venta $ventum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Venta $ventum)
    {
        $this->authorize('admin.venta.edit', $ventum);


        return view('admin.venta.edit', [
            'ventum' => $ventum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVenta $request
     * @param Venta $ventum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVenta $request, Venta $ventum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Venta
        $ventum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ventas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVenta $request
     * @param Venta $ventum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVenta $request, Venta $ventum)
    {
        $ventum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVenta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVenta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Venta::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
