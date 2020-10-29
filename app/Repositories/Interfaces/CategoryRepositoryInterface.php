<?php
namespace App\Repositories\Interfaces;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function categoryWithChildren(int $id);
    public function getAllCategories();
}