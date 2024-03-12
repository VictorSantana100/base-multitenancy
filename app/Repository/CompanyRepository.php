<?php

namespace App\Repository;

use App\Models\Company;

class CompanyRepository{

    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getCompany(){
        return $this->company->get();
    }

    public function show($id){
        return $this->company->findOrFail($id);
    }

    public function store($data){
        return $this->company->create($data);
    }

    public function update($data, $id){
        return $this->show($id)->update($data);
    }

    public function destroy($id){
        return $this->show($id)->delete();
    }
}