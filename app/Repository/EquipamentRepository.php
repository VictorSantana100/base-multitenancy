<?php

namespace App\Repository;

use App\Models\Equipament;

class EquipamentRepository{

    protected $equipament;

    public function __construct(Equipament $equipament)
    {
        $this->equipament = $equipament;
    }

    public function getEquipament(){
        return $this->equipament->get();
    }

    public function getEquipamentById($id){
        return $this->equipament->findOrFail($id);
    }

    public function storeEquipament($data){
        return $this->equipament->create($data);
    }

    public function updateEquipamentById($data, $id){
        return $this->getEquipamentById($id)->update($data);
    }

    public function deleteEquipamentById($id){
        return $this->getEquipamentById($id)->delete();
    }
}