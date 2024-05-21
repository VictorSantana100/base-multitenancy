<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCategoryFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = $this->categoryService->getCategoryService();
        return CategoryResource::collection($categorys);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {
       return $this->categoryService->storeCategoryService($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->categoryService->getCategoryByIdService($id);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCategoryFormRequest $request, string $id)
    {
        $category = $this->categoryService->updateCategoryByIdService($request->all(), $id);
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->categoryService->deleteCategoryByIdService($id);
    }
}
