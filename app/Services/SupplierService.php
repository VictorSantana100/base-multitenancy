<?php

namespace App\Services;

use App\Repository\SupplierRepository;

class SupplierService{

    protected $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getSupplier(){
        return $this->supplierRepository->getSupplier();
    }

    public function showSupplier($id){
        return $this->supplierRepository->show($id);
    }

    public function storeSupplier(array $data){
        return $this->supplierRepository->store($data);
    }

    public function updateSupplier(array $data, $id){
        return $this->supplierRepository->update($data, $id);
    }

    public function destroySupplier($id){
        return $this->supplierRepository->destroy($id);
    }
}