@props(['pass','title','name','route'])
<button type="button"
    class="inline-block rounded-sm text-white font-medium text-sm p-2 px-5  bg-red-400 hover:bg-[#81A1C1]"
    data-te-toggle="modal" data-te-target="#exampleModalCenters{{ $pass }}" data-te-ripple-init
    data-te-ripple-color="light">
    {{ $name }}
</button>



<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none "
    id="exampleModalCenters{{ $pass }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
    role="dialog">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-4/12 translate-y-[-50px]  items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)]">
        <div
            class="pointer-events-auto relative flex w-full flex-col rounded-none border-none bg-gray-100 bg-clip-padding text-current shadow-lg outline-none ">
            <div class=" flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 bg-white border-neutral-100 
            border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal  text-black" id="exampleModalScrollableLabel">
                    {{ $title }}
                </h5>
                <button type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="relative p-4">
                <div class="text-center p-5 flex-auto justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                        <p class="text-sm text-gray-500 px-8" data-te-modal-dismiss>Do you really want to delete this
                            data?
                            This process cannot be undone</p>

                        <div class="p-3  mt-2 text-center space-x-4 flex justify-center">
                            <button
                                class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"
                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                Cancel
                            </button>

                            <form action="/{{ $route }}/{{ $pass }}" method="post" class="d-inline">

                                @method('DELETE')
                                @csrf
                                <button class=" mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm
                                    font-medicoum tracking-wider text-white rounded-full hover:shadow-lg
                                    hover:bg-red-600">Delete</button>
                            </form>

                        </div>
                        <!--footer-->

                </div>
            </div>
        </div>

    </div>
</div>