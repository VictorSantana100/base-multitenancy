<?php

namespace App\Http\Controllers\Api\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\StoreUpdatePermissionFormRequest;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionService->getpermissionService();
        return PermissionResource::collection($permissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePermissionFormRequest $request)
    {
       return $this->permissionService->storepermissionService($request::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permissionService->getpermissionByIdService($id);
        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePermissionFormRequest $request, string $id)
    {
        $permission = $this->permissionService->updatepermissionByIdService($request::all(), $id);
        return new PermissionResource($permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->permissionService->deletepermissionByIdService($id);
    }
}
