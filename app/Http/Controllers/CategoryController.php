<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
 
    public function create()
    {
        return view('categories.create');
    }

   
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

  
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function destroy(Category $category)
    {
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }
        
        
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

   
}
