<?php
namespace App\Http\Api\v1;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryApi
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryWithChildren(int $id)
    {
        $currentCategory = $this->categoryRepository->categoryWithChildren($id);

        foreach ($currentCategory->categoriesWithChildren as $childCategory){
            $this->tree($childCategory);
        }

        return response()->json($currentCategory,200);
    }

    public function allCategories(){
        $all = $this->categoryRepository->getAllCategories();
        foreach( $all as $category){
            foreach ($category->categoriesWithChildren as $childCategory){
              $this->tree($childCategory);
            }
        }
        return response()->json($all,200);
    }

    public function tree($child){
        if ($child->categories){
            foreach ($child->categories as $childCategory){
                $this->tree($childCategory);
            }
        }
    }
}