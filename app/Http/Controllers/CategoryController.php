<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(10)->all();

        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $categories =  Category::where('name','LIKE',"%$filterKeyword%")->paginate(10)->all();
        }
        return view('categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $validateData = $request->validate([
            'name' => 'required | max:255',
            'image' => 'file | max:1024',
        ]);

        
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('category_images', 'public');
        }



        Category::create($validateData);

        return redirect('/categories/')->with('status','Categories Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required | max:255',
            'image' => 'file  | max:1024',
        ];


        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($category->image){
                Storage::delete($category->image);
            }
            $validatedData['image'] =  $request->file('image')->store('category_images','public');
        }

        Category::where('id',$category->id)->update($validatedData);


        return redirect()->route('categories.index')->with('status','Category succesfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image){
            Storage::delete('public/' . $category->image);
        }

        Category::destroy($category->id);

        return redirect()->route('categories.index')->with('status','Category successfully deleted');
    }
}
