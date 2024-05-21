<?php

namespace App\Services;

use App\Repository\ProfileRepository;

class ProfileService{

    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getProfileService(){
        return $this->profileRepository->getprofile();
    }

    public function getprofileByIdService($id){
        return $this->profileRepository->getprofileById($id);
    }

    public function storeprofileService(array $profileData){
        return $this->profileRepository->storeprofile($profileData);
    }

    public function updateprofileByIdService(array $profileData, $id){
        return $this->profileRepository->updateprofileById($profileData, $id);
    }

    public function deleteprofileByIdService($id){
        return $this->profileRepository->deleteprofileById($id);
    }

}