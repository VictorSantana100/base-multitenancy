<?php

namespace App\Services;
use App\Repository\CompanyManagementRepository;

class CompanyManagementService{

    protected $repository;

    public function __construct(CompanyManagementRepository $companyManagementRepository)
    {
        $this->repository = $companyManagementRepository;
    }

    public function getCollaborators($company_uuid){
        return $this->repository->getCollaborators($company_uuid);
    }

    public function getSuppliers($company_uuid){
        return $this->repository->getSuppliers($company_uuid);
    }
}