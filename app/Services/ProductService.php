<?php

namespace App\Services;

use App\Repository\ProductRepository;

class ProductService{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductsService(){
        return $this->productRepository->getProducts();
    }

    public function getProductByIdService($id){
        return $this->productRepository->getProductById($id);
    }

    public function storeProductService(array $productData){
        return $this->productRepository->storeProduct($productData);
    }

    public function updateProductByIdService(array $productData, $id){
        return $this->productRepository->updateProductById($productData, $id);
    }

    public function deleteProductByIdService($id){
        return $this->productRepository->deleteProductById($id);
    }

}