<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductosForce\BulkDestroyProductosForce;
use App\Http\Requests\Admin\ProductosForce\DestroyProductosForce;
use App\Http\Requests\Admin\ProductosForce\IndexProductosForce;
use App\Http\Requests\Admin\ProductosForce\StoreProductosForce;
use App\Http\Requests\Admin\ProductosForce\UpdateProductosForce;
use App\Models\ProductosForce;
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

class ProductosForceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProductosForce $request
     * @return array|Factory|View
     */
    public function index(IndexProductosForce $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ProductosForce::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.productos-force.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.productos-force.create');

        return view('admin.productos-force.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductosForce $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProductosForce $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ProductosForce
        $productosForce = ProductosForce::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/productos-forces'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productos-forces');
    }

    /**
     * Display the specified resource.
     *
     * @param ProductosForce $productosForce
     * @throws AuthorizationException
     * @return void
     */
    public function show(ProductosForce $productosForce)
    {
        $this->authorize('admin.productos-force.show', $productosForce);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductosForce $productosForce
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ProductosForce $productosForce)
    {
        $this->authorize('admin.productos-force.edit', $productosForce);


        return view('admin.productos-force.edit', [
            'productosForce' => $productosForce,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductosForce $request
     * @param ProductosForce $productosForce
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProductosForce $request, ProductosForce $productosForce)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ProductosForce
        $productosForce->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/productos-forces'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/productos-forces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProductosForce $request
     * @param ProductosForce $productosForce
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProductosForce $request, ProductosForce $productosForce)
    {
        $productosForce->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProductosForce $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProductosForce $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ProductosForce::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
