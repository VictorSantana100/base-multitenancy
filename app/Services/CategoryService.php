<?php

namespace App\Services;

use App\Repository\CategoryRepository;

class CategoryService{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategorysService(){
        return $this->categoryRepository->getCategory();
    }

    public function getCategoryByIdService($id){
        return $this->categoryRepository->getCategoryById($id);
    }

    public function storeCategoryService(array $categoryData){
        return $this->categoryRepository->storeCategory($categoryData);
    }

    public function updateCategoryByIdService(array $categoryData, $id){
        return $this->categoryRepository->updateCategoryById($categoryData, $id);
    }

    public function deleteCategoryByIdService($id){
        return $this->categoryRepository->deleteCategoryById($id);
    }

}