@props(['route'])

<div class="flex  justify-between">
    <h1 class="text-xl font-bold ml-7 mt-3 mb-5">{{ $slot }}</h1>

    <form action="{{ route($route) }}" class="w-3/12 mx-5 mt-2 ">

        <input type="text" name="keyword"
            class="p-2  input-bordered placeholder:text-gray-500 w-full  bg-white border border-slate-400"
            value="{{ Request::get('keyword') }}" placeholder="Search... ">

    </form>
</div>