<?php

namespace App\Repository;
use App\Models\Company;
use App\Models\CompanySupplier;
use App\Models\Supplier;
use App\Models\User;

class CompanyManagementRepository{

    protected $company, $user, $companySupplier, $supplier;

    public function __construct(Company $company, User $user, CompanySupplier $companySupplier, Supplier $supplier)
    {
        $this->company = $company;
        $this->user = $user;
        $this->companySupplier = $companySupplier;
        $this->supplier = $supplier;
    }

    public function getCollaborators($company_uuid){
        $company =  $this->company->where('uuid', $company_uuid)->firstOrFail();
        if($company)
            return $this->user->where('company_id', $company->id)->get();
        return $company;
    }

    public function getSuppliers($company_uuid){
         $company = $this->company->where('uuid', $company_uuid)->first();
        if($company)
            $companySupplierIds = $this->companySupplier->where('company_id', $company->id)->pluck('supplier_id')->toArray();
            return $this->supplier->whereIn('id', $companySupplierIds)->get();
        return $company;
    }
}