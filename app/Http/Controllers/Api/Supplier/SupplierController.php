<?php

namespace App\Http\Controllers\Api\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SupplierResource;
use App\Services\SupplierService;
use App\Http\Requests\StoreUpdateSupplierFormRequest;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
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
        $supplier = $this->supplierService->storeSupplier($request->validated());
        return new SupplierResource($supplier);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = $this->supplierService->showSupplier($id);
        return new SupplierResource($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupplierFormRequest $request, $id)
    {
        $this->supplierService->updateSupplier($request->validated(), $id);
        return response(['success' => 'Data Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->supplierService->destroySupplier($id);
    }
}
