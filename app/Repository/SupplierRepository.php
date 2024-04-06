<?php

namespace App\Repository;

use App\Models\Supplier;
use App\Models\CompanySupplier;

class SupplierRepository{

    protected $supplier;
    protected $companySupplier;

    public function __construct(Supplier $supplier, CompanySupplier $companySupplier)
    {
        $this->supplier = $supplier;
        $this->companySupplier = $companySupplier;
    }

    public function getSupplier(){
        return $this->supplier->get();
    }

    public function show($id){
        return $this->supplier->findOrFail($id);
    }

    public function store($data){
        $supplier = $this->supplier->create($data);
        $this->companySupplier->create([
            'company_id'=> $data['company_id'],
            'supplier_id'=> $supplier->id
        ]);
        return $supplier;
    }

    public function update($data, $id){
        return $this->show($id)->update($data);
    }

    public function destroy($id){
        return $this->show($id)->delete();
    }
}