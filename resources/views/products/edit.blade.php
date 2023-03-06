@extends('layouts.main')

@section('content')
<x-sidebar>

    <div class="bg-white w-full container p-5 mx-auto my-10 shadow-lg">

        <form action="{{ route('products.update',$products->id) }}" method="post" enctype="multipart/form-data">

            @method('put')
            @csrf


            <x-input name="name" placeholder="Product Name" :value="$products->name">Name</x-input>
         
            <div class="flex justify-between gap-10">
    
                
                <div class="my-3 w-full">
                    <label for="avatar">Current Avatar : </label>
            <br>
            @if ($products->image)
            <img src="{{ asset('storage/' . $products->image ) }}" width="120px" class="my-3">
            @else
            No Avatar
            @endif 
                    <input type="file" class="p-2  input-bordered border border-slate-400  w-full" name="avatar" id="avatar" value="{{ old('avatar') }}">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                </div>
    
                <div class="w-full mt-9">
                    <x-input name="unit" class="w-1/2" :value="$products->unit" placeholder="Product Unit">Product Unit</x-input>
                </div>
            </div>

            <div class="flex justify-between gap-10">
                <div class="my-5 w-full">
                    <label for="category">Category : </label>
                    <select name="category_id" id="category_id"
                        class="w-full bg-white border border-slate-400 p-2 mt-2">
                        @foreach ($categories as $category)
                        @if(old('category_id',$products->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="my-5 w-full">
                    <label for="supplier">Supplier : </label>
                    <select name="supplier_id" id="supplier_id"
                        class=" mt-2 w-full bg-white border border-slate-400 p-2">
                        @foreach ($suppliers as $category)
                        @if(old('category_id',$products->supplier_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-5">
                <textarea name="description" id="description" placeholder="Description Product" cols="30" rows="10"
                    class="border w-full p-3 border-slate-500 placeholder:text-gray-500">{{ $products->description }}</textarea>
            </div>

            <a class="py-2.5 px-5 text-sm bg-red-500 text-white mx-2 hover:bg-red-400"
                href="{{ route('products.index') }}"><i class="fa fa-solid fa-xmark"></i>
                Back</a>
            <x-submit></x-submit>
        </form>
    </div>

</x-sidebar>
@endsection