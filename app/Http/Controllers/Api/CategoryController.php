<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    private $rules = [
        'name' => 'required|max:255',
        'is_active' => 'boolean'
    ];
    
    // GET categories
    public function index()
    {
        return Category::all();
    }

    // POST categories
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        return Category::create($request->all()); // 201
    }

    // GET categories/n
    public function show(Category $category)
    {
        return $category;
    }

    // PUT categories/n
    public function update(Request $request, Category $category)
    {
        // dd($category); // dump and die
        $this->validate($request, $this->rules);
        $category->update($request->all());
        return $category; // 200 
    }

    // DELETE categories/n
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent(); // 204 - no content
    }
}
