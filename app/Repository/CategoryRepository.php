<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\CategoryType;
class CategoryRepository{

    protected $category;
    protected $categoryTypes;

    public function __construct(Category $category, CategoryType $categoryTypes)
    {
        $this->category = $category;
        $this->categoryTypes = $categoryTypes;
    }

    public function getCategory(){
        return $this->category->get();
    }

    public function getCategoryById($id){
        return $this->category->findOrFail($id);
    }

    public function storeCategory($data){
        $category = $this->category->create([
            'name' => $data['name']
        ]);
        $this->addCategorieType($category, $data['types']);
        return $category;
    }

    public function updateCategoryById($data, $id){
        $category = $this->getCategoryById($id);
        $this->removeCategorieTypeById($id);
        $this->addCategorieType($category, $data['types']);
        $category->update([
            'name'=> $data['name']
        ]);
        return $category;
    }

    public function deleteCategoryById($id){
        $this->removeCategorieTypeById($id);
        return $this->getCategoryById($id)->delete();
    }

    public function removeCategorieTypeById($id){
        $this->categoryTypes->where('categorie_id', $id)->delete();
    }
    
    public function addCategorieType($category, $types){
        foreach($types as $type){
            $this->categoryTypes->create([
                'type_id' => $type,
                'categorie_id' => $category->id
            ]);
        }
    }
}