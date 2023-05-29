<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            
            return response()->json(['message' => 'User login successfully'], 201);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function showCategory()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    public function showProduct()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
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

        $products = Product::create($request->all());
        return response()->json(['message' => 'Add Product successfully'], 201);
    }

    public function show_product($id){
        $data = Product::find($id);
        return response()->json(['data' => $data]);
    }

    public function updateProduct(Request $request, $id)
    {
    
        $user = Product::findOrFail($id);
        $user->update($request->all());
        return response()->json(['message' => 'Update Product successfully'], 201);
    }

    public function deleteProduct($id)
    {
        $delete_product = Product::find($id);
        $delete_product->delete();
        return response()->json(['message' => 'Delete Product successfully'], 201);
    }
}
