<?php

namespace App\Http\Controllers\Api\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TypeResource;
use App\Http\Requests\StoreUpdateTypeFormRequest;
use App\Services\TypeService;

class TypeController extends Controller
{
    protected $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = $this->typeService->getTypesService();
        return TypeResource::collection($types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateTypeFormRequest $request)
    {
        return $this->typeService->storeTypeService($request::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Type = $this->typeService->getTypeByIdService($id);
        return new TypeResource($Type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateTypeFormRequest $request, string $id)
    {
        $Type = $this->typeService->updateTypeByIdService($request::all(), $id);
        return new TypeResource($Type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->typeService->deleteTypeByIdService($id);
    }
}
