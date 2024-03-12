<?php

namespace App\Services;

use App\Repository\CompanyRepository;

class CompanyService{

    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompany(){
        return $this->companyRepository->getCompany();
    }

    public function showCompany($id){
        return $this->companyRepository->show($id);
    }

    public function storeCompany(array $data){
        return $this->companyRepository->store($data);
    }

    public function updateCompany(array $data, $id){
        return $this->companyRepository->update($data, $id);
    }

    public function destroyCompany($id){
        return $this->companyRepository->destroy($id);
    }
}