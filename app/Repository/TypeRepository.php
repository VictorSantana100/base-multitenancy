<?php

namespace App\Repository;

use App\Models\Type;

class TypeRepository{

    protected $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    public function getType(){
        return $this->type->get();
    }

    public function getTypeById($id){
        return $this->type->findOrFail($id);
    }

    public function storeType($data){
        return $this->type->create($data);
    }

    public function updateTypeById($data, $id){
        return $this->getTypeById($id)->update($data);
    }

    public function deleteTypeById($id){
        return $this->getTypeById($id)->delete();
    }
}