<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory(){
        return $this->category->get();
    }

    public function getCategoryById($id){
        return $this->category->findOrFail($id);
    }

    public function storeCategory($data){
        return $this->category->create($data);
    }

    public function updateCategoryById($data, $id){
        return $this->getCategoryById($id)->update($data);
    }

    public function deleteCategoryById($id){
        return $this->getCategoryById($id)->delete();
    }
}