<?php

namespace App\Http\Controllers\Api\Equipament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EquipamentResource;
use App\Services\EquipamentService;
use App\Http\Requests\StoreUpdateEquipamentFormRequest;

class EquipamentController extends Controller
{
    protected $equipamentService;

    public function __construct(EquipamentService $equipamentService)
    {
        $this->equipamentService = $equipamentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipaments = $this->equipamentService->getEquipamentsService();
        return EquipamentResource::collection($equipaments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateEquipamentFormRequest $request)
    {
        return $this->equipamentService->storeequipamentService($request::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipament = $this->equipamentService->getEquipamentByIdService($id);
        return new EquipamentResource($equipament);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateEquipamentFormRequest $request, string $id)
    {
        $equipament = $this->equipamentService->updateEquipamentByIdService($request::all(), $id);
        return new equipamentResource($equipament);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->equipamentService->deleteEquipamentByIdService($id);
    }
}
