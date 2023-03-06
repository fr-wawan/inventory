@extends('layouts.main')

@section('content')




<x-sidebar>
    @if(session('status'))
    <x-alert></x-alert>
    </div>
    @endif



    <div class="mb-3 mt-10 mx-auto container">
        <a href="{{ route('products.create') }}" class="p-3 bg-[#4C566A] hover:bg-[#81A1C1] text-white rounded-md"><i
                class="fa fa-sharp fa-solid fa-plus"></i> New Product</a>
    </div>
    <div class="bg-white shadow-lg pt-3 w-full container mx-auto my-5">
        <x-search-component route="products.index">Products List</x-search-component>
        <x-table :headers="['image','name','supplier','category','unit']" :data="$product" route1="products" modal="no"
            route2="suppliers.destroy">


        </x-table>
    </div>
</x-sidebar>



@endsection