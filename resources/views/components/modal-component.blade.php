@props(['pass','title','name','route'])
<button type="button"
    class="inline-block rounded-sm text-white font-medium text-sm p-2 px-5  bg-[#5E81AC] hover:bg-[#81A1C1]"
    data-te-toggle="modal" data-te-target="#exampleModalCenter{{ $pass }}" data-te-ripple-init
    data-te-ripple-color="light">
    {{ $name }}
</button>



<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none "
    id="exampleModalCenter{{ $pass }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
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
                <form action="/{{ $route }}/{{ $pass }}" class="text-left bg-gray-100 p-5 " method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    {{ $slot }}

                    <div
                        class="flex justify-start rounded-b-md border-t-2 border-neutral-100 border-opacity-100  dark:border-opacity-50">
                        <x-submit></x-submit>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>