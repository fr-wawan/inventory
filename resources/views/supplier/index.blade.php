@extends('layouts.main')

@section('content')



<x-sidebar>
  @if(session('status'))

  <x-alert></x-alert>
  </div>
  @endif

  <div class="flex">

    <div class="bg-white shadow-lg pt-3 w-8/12 mx-auto my-10">

      <x-search-component route="suppliers.index">Suppliers List</x-search-component>

      {{-- @dd($suppliers) --}}
      <x-table :headers="['name','address','phone']" :data="$suppliers" route1="suppliers" route2="suppliers.destroy">

      </x-table>

    </div>
    <div class=" bg-white pt-3 w-3/12 h-96 mx-auto my-10 shadow-lg">
      <form action="{{ route('suppliers.store') }}" class="w-11/12 mx-auto" method="post">
        @csrf

        <x-input :name="'name'" :placeholder="'Supplier Name'">
          Supplier Name</x-input>
        <x-input :name="'address'" :placeholder="'Supplier Adress'">Address</x-input>
        <x-input :name="'phone'" :type="'number'" :placeholder="'Supplier Phone Number'">
          Phone </x-input>

        <div class="mt-5">
          <x-submit></x-submit>
        </div>
      </form>
    </div>
  </div>
</x-sidebar>



@endsection