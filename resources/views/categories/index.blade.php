@extends('layouts.main')

@section('content')



<x-sidebar>
  @if(session('status'))
  <x-alert></x-alert>
  </div>
  @endif

  <div class="flex">

    <div class="bg-white shadow-lg pt-3 w-8/12 mx-auto my-10">
      <x-search-component route="categories.index">Category List</x-search-component>


      <x-table :headers="['image','name']" :data="$categories" route1="categories" route2="suppliers.destroy">
      </x-table>
    </div>

    <div class=" bg-white pt-3 w-3/12 h-80 mx-auto my-10 shadow-lg">

      <form action="{{ route('categories.store') }}" class="w-11/12 mx-auto" method="post"
        enctype="multipart/form-data">
        @csrf

        <x-input :name="'name'" :placeholder="'Category Name'">
          Category Name</x-input>
        <x-input :name="'image'" :type="'file'" :placeholder="'Category Image'">Category Image</x-input>

        <div class="mt-5">
          <x-submit></x-submit>
        </div>
      </form>
    </div>
  </div>



  </div>
</x-sidebar>



@endsection