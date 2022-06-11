<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashbord()
    {
        return view('backend.dashbord');
    }

    public function product()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.product', compact('products'));
    }

    public function create()
    {
        return view('backend.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|max:1000',
            'photo' => 'required|image|max:3072',
        ], [
            'photo.image' => 'The photo must be an PNG or JPG',
            'photo.max' => 'The photo must not be greater than 3 MB'
        ]);
        $photo = $request->file('photo');
        $newName = 'product_' . time() . '.' . $photo->getClientOriginalExtension();
        $photo->move('asset/uplode/products', $newName);
        $inputs = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'desc' => $request->input('description'),
            'photo' => $newName,
        ];
        Product::create($inputs);
        return redirect()->route('admin.product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|max:1000',
        ]);
        $product = Product::find($id);
        $inputs = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'desc' => $request->input('description'),
        ];
        $photo = $request->file('photo');
        if ($photo) {
            if (file_exists('asset/uplode/products/' . $product->photo)) {
                unlink('asset/uplode/products/' . $product->photo);
            }
            $newName = 'product_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('asset/uplode/products', $newName);
            $inputs['photo'] = $newName;
        }
        $product->update($inputs);
        return redirect()->route('admin.product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (file_exists('asset/uplode/products/' . $product->photo)) {
            unlink('asset/uplode/products/' . $product->photo);
        }
        $product->delete();
        return redirect()->route('admin.product');
    }
}
