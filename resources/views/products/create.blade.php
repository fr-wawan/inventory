@extends('layouts.main')

@section('content')
<x-sidebar>

    <div class="bg-white w-full container p-5 mx-auto my-10 shadow-lg">

        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <x-input name="name" placeholder="Product Name">Name</x-input>
            <div class="flex justify-between gap-10">
                <x-input name="image" placeholder="Product Image" class="w-1/2" type="file">Product Image</x-input>
                <x-input name="unit" class="w-1/2" placeholder="Product Unit">Product Unit</x-input>
            </div>

            <div class="flex justify-between gap-10">
                <div class="my-5 w-full">
                    <label for="category">Category : </label>
                    <select name="category_id" id="category_id"
                        class="w-full bg-white border border-slate-400 p-2 mt-2">
                        <option value="" disabled selected>Please choose Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-5 w-full">
                    <label for="supplier">Supplier : </label>
                    <select name="supplier_id" id="supplier_id"
                        class=" mt-2 w-full bg-white border border-slate-400 p-2">
                        <option value="" disabled selected>Please choose Supplier</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-5">
                <textarea name="description" id="description" placeholder="Description Product" cols="30" rows="10"
                    class="border w-full p-3 border-slate-500 placeholder:text-gray-500"></textarea>
            </div>

            <a class="py-2.5 px-5 text-sm bg-red-500 text-white mx-2 hover:bg-red-400"
                href="{{ route('products.index') }}"><i class="fa fa-solid fa-xmark"></i> Back</a>
            <x-submit></x-submit>
        </form>
    </div>

</x-sidebar>
@endsection