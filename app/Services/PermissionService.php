<?php

namespace App\Services;

use App\Repository\PermissonRepository;
use App\Repository\PermissionRepository;

class PermissionService{

    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getpermissionService(){
        return $this->permissionRepository->getpermission();
    }

    public function getpermissionByIdService($id){
        return $this->permissionRepository->getpermissionById($id);
    }

    public function storepermissionService(array $permissionData){
        return $this->permissionRepository->storepermission($permissionData);
    }

    public function updatepermissionByIdService(array $permissionData, $id){
        return $this->permissionRepository->updatepermissionById($permissionData, $id);
    }

    public function deletepermissionByIdService($id){
        return $this->permissionRepository->deletepermissionById($id);
    }

}