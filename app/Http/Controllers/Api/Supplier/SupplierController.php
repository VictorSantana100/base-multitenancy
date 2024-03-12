<?php

namespace App\Http\Controllers\Api\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SupplierResource;
use App\Service\Supplier;
use App\Http\Requests\StoreUpdateSupplierFormRequest;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(Supplier $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $suppliers = $this->supplierService->getSupplier();
       return SupplierResource::collection($suppliers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupplierFormRequest $request)
    {
        $supplier = $this->supplierService->storeSupplier($request->all());
        return new supplierResource($supplier);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = $this->supplierService->showSupplier($id);
        return new supplierResource($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupplierFormRequest $request, string $id)
    {
        $supplier = $this->supplierService->updateSupplier($request->all(), $id);
        return new supplierResource($supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->supplierService->destroySupplier($id);
    }
}
