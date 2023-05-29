<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showDashboard()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('pages.dashboard', compact('categories', 'products'));
    }
    public function showCategory()
    {
        $categories = Category::all();
        return view('pages.show_categories', compact('categories'));
    }
    public function showProduct()
    {
        $user_id = auth()->id();
        $products = Product::all();
        return view('pages.show_products', compact('products', 'user_id'));
    }

    public function addProduct()
    {
        $user_id = auth()->id();
        $categories = Category::all();
        return view('pages.add_product', compact('categories', 'user_id'));
    }

    public function storeProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ],
        [
            'name.required' => 'Name is Required',
            'category_id.required' => 'Category is Required',
            'price.required' => 'Price is Required',
            'quantity.required' => 'Quantity is Required'
        ]);
        $validatedData['created_by'] = Auth()->id();

        $products = Product::create($validatedData);
        return redirect('/show_products')->with('message', 'Add Product Succsessfully');
    }

    public function editProduct($id)
    {
        $user_id = auth()->id();
        $product = Product::find($id);
        $categories = Category::all();
        return view('pages.add_product', compact('product', 'categories', 'user_id'));
    }

    public function updateProduct(Request $request, $id)
    {
    
        $user = Product::findOrFail($id);
        $user->update($request->all());

        return redirect('/show_products')->with('message', 'Update Product Succsessfully');
    }

    public function deleteProduct($id)
    {
        $delete_product = Product::find($id);
        $delete_product->delete();
        return redirect('/show_products')->with('message', 'Delete Product Succsessfully');
    }
}
