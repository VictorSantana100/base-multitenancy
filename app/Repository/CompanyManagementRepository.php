<?php

namespace App\Repository;
use App\Models\Company;
use App\Models\User;

class CompanyManagementRepository{

    protected $company, $user;

    public function __construct(Company $company, User $user)
    {
        $this->company = $company;
        $this->user = $user;
    }

    public function getCollaborators($company_uuid){
        $company =  $this->company->where('uuid', $company_uuid)->firstOrFail();
        if($company)
            return $this->user->where('company_id', $company->id)->get();
        return $company;
    }
}