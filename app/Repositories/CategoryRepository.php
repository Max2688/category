<?php
namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use App\Exceptions\CategoryNotFoundException;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function categoryWithChildren(int $id)
    {
        // TODO: Implement getByIdCategory() method.
        $currentCategory = Category::with('categoriesWithChildren')->find($id);

        if(!$currentCategory)
        {
            throw new CategoryNotFoundException('Category not found by ID ' . $id);
        }

        return $currentCategory;
    }

    public function getAllCategories()
    {
        // TODO: Implement allCategories() method.
        return Category::with('categoriesWithChildren')->whereNull('parent_id')->orderBy('sort_order','asc')->get();
    }
}