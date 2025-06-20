<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categoeies = Category::all('id', 'name');
        return view('admin.products.index', [
            'products' => $products,
            'categories' => $categoeies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cates = Category::all(['id', 'name']);
        return view('admin.products.add.index', [
            'cates' => $cates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // [ 1 ] Validate The Incoming Data From The Form
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Product::class],
            'cate_id' => ['required', 'string'],
            'stock_quant' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
        ]);

        // [ 2 ] Handle Image Upload
        $imagePath = $request->file('file')->store('products', 'public');

        // [ 3 ] Store The Data In Products Table
        $product = Product::create([
            'name' => $validator['name'],
            'cate_id' => $validator['cate_id'],
            'stock_quant' => $validator['stock_quant'],
            'price' => $validator['price'],
            'file' => $imagePath,
            'description' => $validator['description'] != null ? $validator['description'] : '',
        ]);

        // [ 4 ] Redirect With Success Or Error Message
        if($product) {
            return redirect()->route('products')->with('success', 'Successfully created product "' . $validator['name'] . '" data and store them in data storage.');
        }

        return redirect()->back()->with('error', 'Unable to create product "' . $validator['name'] . '" data, please contact the developer?');
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
        $product = Product::find($id);
        $cates = Category::all(['id', 'name']);
        return view('admin.products.edit.index', [
            'product' => $product,
            'cates' => $cates
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Getting the current product name to ignore unique vaildation if the name is the same as request name
        $old = Product::find($id)->only('name');
        // Accept ignoring unique rule or activate it
        $validator = $request->name == $old['name'] 
        ? 
            $request->validate(['name' => ['required', 'string', 'max:255'],])
        : 
            $request->validate(['name' => ['required', 'string', 'max:255', 'unique:'.Product::class],])
        ;
        // Validate other feilds
        $validator = array_merge($validator, $request->validate([
            'cate_id' => ['required', 'string'],
            'stock_quant' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
        ]));
        // If the user select an image then store new image path otherwise grab the old one
        if($request->hasFile('file')) {
            $validator = array_merge($validator, $request->validate([
                'file' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ]));
            $imagePath = $request->file('file')->store('products', 'public');
        } else {
            $Path = Product::find($id)->only('file');
            $imagePath = $Path['file'];
        }
        // Update The record
        $updated = Product::where('id', $id)->update([
            'name' => $validator['name'],
            'cate_id' => $validator['cate_id'],
            'stock_quant' => $validator['stock_quant'],
            'price' => $validator['price'],
            'file' => $imagePath,
            'description' => $validator['description'] ?? '',
        ]);
        // Success
        if($updated):
            return redirect()->route('products')->with('success', 'Successfully updated product "'.$validator['name'].'" data to new data.'); 
        endif;
        // Failure
        return redirect()->back()->with('error', 'unable to update product "'.$validator['name'].'" data to new data, please contact the developer.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Getting the product name
        $product = Product::find($id)->only('name');
        // Find the product with id = $id and then delete it
        $deleted = Product::find($id)->delete();
        // Success
        if($deleted) {
            return redirect()->back()->with('success', 'Successfully deleted product "'.$product['name'].'" data.');
        }
        // Failure
        return redirect()->back()->with('error', 'Unable to delete product "'.$product['name'].'" data, please contact the developer.');
    }
}
