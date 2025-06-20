<?php

namespace App\Http\Controllers\Panel;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Category::class],
            'description' => ['string', 'nullable']
        ]);

        $category = Category::create([
            'name' => $validator['name'],
            'description' => $validator['description']
        ]);

        if($category) {
            return redirect()->route('categories')->with('success', 'Successfully added category "' . $validator['name'] . '" data.');
        }

        return redirect()->back()->with('error', 'Failed to add category "' . $validator['name'] . '" data, please contact the developer.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all('name', 'description', 'id')->where('id', $id)->first();
        return view('admin.categories.edit.index', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fetching the old Category name to ignore unique validation
        $old_cate = Category::all('id', 'name', 'description')->where('id', $id)->first();
        // If the old_cate_name = request_name the ignore unique validation otherwise activate unique rule
        $validator = $old_cate->name == $request->name ? $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
            ]) : $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:'.Category::class],
                'description' => ['nullable', 'string'],
            ]);
        // Updating the old data with the new one
        $updated = Category::where('id', $id)->update([
            'name' => $validator['name'],
            'description' => $validator['description']
        ]);
        // Success
        if($updated) {
            return redirect()->route('categories')->with('success', 'Successfully updated category "'.$old_cate->name.'" data to "'.$validator['name'].'"');
        }
        // Failure
        return redirect()->back()->with('error', 'Unable to update category "'.$old_cate->name.'" data to "'.$validator['name'].'"');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetching the category name
        $cate = Category::find($id)->only('name');
        // Find the record and then delete it permentaly
        $deleted = Category::find($id)->delete();
        // // Success
        if($deleted) {
            return redirect()->route('categories')->with('success', 'Successfully deleted category "'.$cate['name'].'" data.');
        }
        // // Failure
        return redirect()->back()->with('error', 'Unable to delete category "'.$cate['name'].'" data.');   
    }
}
