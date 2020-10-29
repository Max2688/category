<?php

namespace App\Exceptions;

use Exception;

class CategoryNotFoundException extends Exception
{
    public function report()
    {
        \Log::debug('Category not found');
    }

    public function render($request)
    {
        return  response()->json(['error' => 'Category not found'], 404);
    }
}
