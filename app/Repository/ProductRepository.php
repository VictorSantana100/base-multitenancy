<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProducts(){
        return $this->product->get();
    }

    public function getProductById($id){
        return $this->product->findOrFail($id);
    }

    public function storeProduct(array $productData){
        return $this->product->create($productData);
    }

    public function updateProductById(array $productData, $id){
        return $this->product->getProductById($id)->update($productData);
    }

    public function deleteProductById($id){
        return $this->product->getProductById($id)->delete();
    }
    
}