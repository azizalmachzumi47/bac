<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function addproduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'stock' => 'required',
            'price' => 'required',
            'product_description' => 'required|string|max:300',
            'product_image' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $attachmentFile = $request->file('product_image');
        $attachmentName = time() . '_product_image.' . $attachmentFile->getClientOriginalExtension();
        $attachmentFile->move(public_path('product_bac'), $attachmentName);

        Product::create([
            'product_name' => $request->product_name,
            'stock' => $request->stock,
            'price' => $request->price,
            'product_description' => $request->product_description,
            'product_image' => $attachmentName,
        ]);

        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan!');
    }

    public function editproduct_action(Request $request, $id_product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'stock' => 'required',
            'price' => 'required',
            'product_description' => 'required|string|max:300',
            'product_image' => 'file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $products = Product::findOrFail($id_product);

        $attachmentName = $products->product_image;

        if ($request->hasFile('product_image')) {
            $oldPath = public_path('product_bac/' . $products->product_image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $attachmentFile = $request->file('product_image');
            $attachmentName = time() . 'product_image.' . $attachmentFile->getClientOriginalExtension();
            $attachmentFile->move(public_path('product_bac'), $attachmentName);
        }

        $products->update([
            'product_name' => $request->product_name,
            'stock' => $request->stock,
            'price' => $request->price,
            'product_description' => $request->product_description,
            'product_image' => $attachmentName,
        ]);

        return redirect()->route('product.index')->with('success', 'Product berhasil diperbarui!');
    }

    public function deleteproduct($id_product)
    {
        $products = Product::findOrFail($id_product);
        if ($products->product_image) {
            $oldPath = public_path('product_bac/' . $products->product_image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $products->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus.');
    }
}
