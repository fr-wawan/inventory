@props(['headers','data','route1','route2','modal' => 'yes'])
<div class="flex flex-col mx-auto">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-center text-base  ">
          <thead class="border-b bg-zinc-200 ">
            <tr class="text-xs">
              <th class="p-3 uppercase text-xs">#</th>
              @foreach ($headers as $header)
              <th class="p-3 uppercase text-xs">{{ $header }}</th>
              @endforeach
              <th class="p-3 uppercase text-xs">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $row)
            <tr class="border-b">
              <td>{{ $loop->iteration }}</td>
              @foreach ($headers as $key)
              @if ($key === 'image')
                @if (isset($row['image']) && !empty($row['image']))
                  <td class="whitespace px-6">
                    <img src="{{ asset('storage/' . $row['image']) }}" class="mx-auto" alt="" width="72px">
                  </td>
                @else
                  <td>no image</td>
                @endif
              @elseif($key === 'supplier')
                @if (isset($row['supplier']))
                  <td>{{ $row['supplier']->name }}</td>
                @endif
              @elseif($key === 'category')
                @if (isset($row['category']))
                  <td>{{ $row['category']->name }}</td>
                @endif
              @else
                <td class="whitespace px-6 py-4">{{ $row[$key] }}</td>
              @endif
            
              @endforeach

              @if($modal == 'yes')
              <td class="flex justify-center gap-2 mt-3">
                <x-modal-component :pass="$row->id" :route="$route1" name="Edit" title="Update Data">
                    @foreach($headers as $field)

                    @if ($field === 'image')
                    <span class="text-gray-500 text-sm">Current Avatar : </span>
                    @if ($row->image)
                    <img src="{{ asset('storage/' . $row  ->image ) }}" width="120px" class="my-3">
                    @else
                    No Avatar
                    @endif
                    <x-input :name="'image'" :type="'file'" :placeholder="'Category Image'">Categories
                      Image
                    </x-input>

                    @else
                    <x-input :name="$field" :placeholder="'Supplier ' . ucfirst($field)"
                      :value="old($field, $row[$field])">{{ ucfirst($field) }}</x-input>
                    @endif


                    @endforeach
                </x-modal-component>

                <x-delete-modal :pass="$row->id" :route="$route1" name="Delete" title="Delete Data">
                  <h1 class="text-5xl text-black">Are You Sure?</h1>

                </x-delete-modal>

              
              </td>
              @else
              <td>
                <a href="{{ route($route1 . '.edit',$row->id) }}" class="inline-block rounded-sm text-white font-medium text-sm p-2 px-5  bg-[#5E81AC] hover:bg-[#81A1C1]">Edit</a>
              
                <x-delete-modal :pass="$row->id" :route="$route1" name="Delete" title="Delete Data">
                  <h1 class="text-5xl text-black">Are You Sure?</h1>

                </x-delete-modal>

              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>