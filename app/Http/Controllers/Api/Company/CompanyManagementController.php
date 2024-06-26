<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Services\CompanyManagementService;
use App\Http\Resources\UserResource;

use Illuminate\Http\Request;

class CompanyManagementController extends Controller
{
    protected $companyManagement;

    public function __construct(CompanyManagementService $companyManagement)
    {
        $this->companyManagement = $companyManagement;
    }

    public function collaborators($company_uuid){
        $collaborators = $this->companyManagement->getCollaborators($company_uuid);
        return UserResource::collection($collaborators);
    }

    public function suppliers($company_uuid){
        $suppliers = $this->companyManagement->getSuppliers($company_uuid);
        return $suppliers;
    }
}
