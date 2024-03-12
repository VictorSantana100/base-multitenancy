<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Http\Requests\StoreUpdateCompanyFormRequest;

class CompanyController extends Controller
{

    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $companys = $this->companyService->getCompany();
       return CompanyResource::collection($companys);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCompanyFormRequest $request)
    {
        $company = $this->companyService->storeCompany($request->all());
        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = $this->companyService->showCompany($id);
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCompanyFormRequest $request, string $id)
    {
        $company = $this->companyService->updateCompany($request->all(), $id);
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->companyService->destroyCompany($id);
    }
}
