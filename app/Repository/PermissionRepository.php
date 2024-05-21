<?php

namespace App\Repository;

use App\Models\Permission;

class PermissionRepository{

    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getpermission(){
        return $this->permission->get();
    }

    public function getpermissionById($id){
        return $this->permission->findOrFail($id);
    }

    public function storepermission($data){
        return $this->permission->create($data);
    }

    public function updatepermissionById($data, $id){
        return $this->getpermissionById($id)->update($data);
    }

    public function deletepermissionById($id){
        return $this->getpermissionById($id)->delete();
    }
}