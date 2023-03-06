<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::paginate(10)->all();
        $filterKeyword = $request->get("keyword");

        if ($filterKeyword) {
            $product = Product::where("name", "LIKE", "%$filterKeyword%")
                ->paginate(10)
                ->all();
        }

        return view("products.index", ["product" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view("products.create", [
            "categories" => $category,
            "suppliers" => $supplier,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required | max:255",
            "unit" => "required",
            "supplier_id" => "required",
            "category_id" => "required",
            "description" => "required",
            "image" => "required | file | max:1024",
        ]);

        $product = new Product();
        $product->name = $request->input("name");
        $product->unit = $request->input("unit");
        $product->category_id = $request->input("category_id");
        $product->supplier_id = $request->input("supplier_id");
        $product->description = $request->input("description");

        if ($request->file("image")) {
            $file = $request->file("image")->store("product_images", "public");
            $product->image = $file;
        }

        $product->save();

        return redirect("/products/")->with(
            "status",
            "Product successfully added"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view("products.edit", [
            "categories" => $category,
            "suppliers" => $supplier,
            "products" => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required | max:255",
            "unit" => "required",
            "supplier_id" => "required",
            "category_id" => "required",
            "description" => "required",
            "image" => "required | file | max:1024",
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input("name");
        $product->unit = $request->input("unit");
        $product->category_id = $request->input("category_id");
        $product->supplier_id = $request->input("supplier_id");
        $product->description = $request->input("description");

        if ($request->file("image")) {
            if (
                $product->image &&
                file_exists(storage_path("app/public" . $product->image))
            ) {
                Storage::delete("public/" . $product->image);
            }
            $file = $request->file("avatar")->store("product_images", "public");

            $product->image = $file;
        }

        $product->save();

        return redirect()
            ->route("products.index")
            ->with("status", "Products successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete("public/" . $product->image);
        }

        Product::destroy($product->id);

        return redirect()
            ->route("products.index")
            ->with("status", "Product successfully deleted");
    }
}
