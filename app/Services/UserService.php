<?php

namespace App\Services;

use App\Repository\UserRepository;

class UserService{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(){
        return $this->userRepository->getUser();
    }

    public function showUser($id){
        return $this->userRepository->show($id);
    }

    public function storeUser(array $data){
        return $this->userRepository->store($data);
    }

    public function updateUser(array $data, $id){
        return $this->userRepository->update($data, $id);
    }

    public function destroyUser($id){
        return $this->userRepository->destroy($id);
    }
}