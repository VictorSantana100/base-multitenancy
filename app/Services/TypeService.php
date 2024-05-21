<?php

namespace App\Services;

use App\Repository\TypeRepository;

class TypeService{

    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function getTypesService(){
        return $this->typeRepository->gettype();
    }

    public function getTypeByIdService($id){
        return $this->typeRepository->gettypeById($id);
    }

    public function storeTypeService(array $typeData){
        return $this->typeRepository->storeType($typeData);
    }

    public function updateTypeByIdService(array $typeData, $id){
        return $this->typeRepository->updateTypeById($typeData, $id);
    }

    public function deleteTypeByIdService($id){
        return $this->typeRepository->deleteTypeById($id);
    }

}