<?php

namespace App\Services;

use App\Repository\EquipamentRepository;

class EquipamentService{

    protected $equipamentRepository;

    public function __construct(EquipamentRepository $equipamentRepository)
    {
        $this->equipamentRepository = $equipamentRepository;
    }

    public function getEquipamentsService(){
        return $this->equipamentRepository->getEquipament();
    }

    public function getEquipamentByIdService($id){
        return $this->equipamentRepository->getEquipamentById($id);
    }

    public function storeEquipamentService(array $equipamentData){
        return $this->equipamentRepository->storeEquipament($equipamentData);
    }

    public function updateEquipamentByIdService(array $equipamentData, $id){
        return $this->equipamentRepository->updateEquipamentById($equipamentData, $id);
    }

    public function deleteEquipamentByIdService($id){
        return $this->equipamentRepository->deleteEquipamentById($id);
    }

}