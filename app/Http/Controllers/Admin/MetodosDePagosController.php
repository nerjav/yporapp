<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MetodosDePago\BulkDestroyMetodosDePago;
use App\Http\Requests\Admin\MetodosDePago\DestroyMetodosDePago;
use App\Http\Requests\Admin\MetodosDePago\IndexMetodosDePago;
use App\Http\Requests\Admin\MetodosDePago\StoreMetodosDePago;
use App\Http\Requests\Admin\MetodosDePago\UpdateMetodosDePago;
use App\Models\MetodosDePago;
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

class MetodosDePagosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMetodosDePago $request
     * @return array|Factory|View
     */
    public function index(IndexMetodosDePago $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MetodosDePago::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'descripcion'],

            // set columns to searchIn
            ['id', 'nombre', 'descripcion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.metodos-de-pago.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.metodos-de-pago.create');

        return view('admin.metodos-de-pago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMetodosDePago $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMetodosDePago $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MetodosDePago
        $metodosDePago = MetodosDePago::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/metodos-de-pagos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/metodos-de-pagos');
    }

    /**
     * Display the specified resource.
     *
     * @param MetodosDePago $metodosDePago
     * @throws AuthorizationException
     * @return void
     */
    public function show(MetodosDePago $metodosDePago)
    {
        $this->authorize('admin.metodos-de-pago.show', $metodosDePago);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MetodosDePago $metodosDePago
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MetodosDePago $metodosDePago)
    {
        $this->authorize('admin.metodos-de-pago.edit', $metodosDePago);


        return view('admin.metodos-de-pago.edit', [
            'metodosDePago' => $metodosDePago,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMetodosDePago $request
     * @param MetodosDePago $metodosDePago
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMetodosDePago $request, MetodosDePago $metodosDePago)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MetodosDePago
        $metodosDePago->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/metodos-de-pagos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/metodos-de-pagos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMetodosDePago $request
     * @param MetodosDePago $metodosDePago
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMetodosDePago $request, MetodosDePago $metodosDePago)
    {
        $metodosDePago->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMetodosDePago $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMetodosDePago $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MetodosDePago::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
