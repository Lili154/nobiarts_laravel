<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::with('section')->get();

        return response()->json(['categories' => $categories]);
    }

    public function getCategory($id)
    {
        $category = Category::with('section')->find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }
}
