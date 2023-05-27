<div>
    <div></div>
    <div class="mx-auto mt-8 w-2/3 p-4 bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg">
        <form class="flex w-full" wire:submit.prevent="requestPCHome">
            <x-input wire:model.defer="search" class="w-11/12 h-8 p-4" />
            <div class="flex-1"></div>
            <x-button class="ml-4">Search</x-button>
        </form>
    </div>
    <div class="w-4/5 py-12 mx-auto sm:px-6 lg:px-8">
        @foreach ($result as $prod)
            <div  class="bg-[#FEFCEC] flex flex-col items-center border border-gray-200 rounded-lg shadow md:flex-row mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12 mt-4">
                <div class="flex flex-col justify-between p-4 leading-normal w-1/3 xl:w-1/5 2xl:w-1/5">
                    <a href="{{route('product.show', ["product"=>$prod['Id']])}}">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$prod['img']}}" alt="">
                    </a>
                </div>
                <div class="flex flex-col p-4 leading-normal w-1/3 xl:w-3/5 2xl:w-3/5">
                    <a href="{{route('product.show', ["product"=>$prod['Id']])}}">
                        <h5 class="mb-4 text-2xl font-bold tracking-tight text-blue-600 hover:underline">{{$prod['name']}}</h5>
                    </a>
                    <p class="mt-3 font-normal text-gray-700 overflow-hidden line-clamp-3">{{$prod['describe']}}</p>
                </div>
                <div class="flex flex-col items-center justify-between px-4 w-1/3 xl:w-1/5 2xl:w-1/5">
                    @if($prod['origin_price'] !== $prod['price'])
                        <p class="mb-3 font-normal text-xl text-gray-700">原價: ${{$prod['origin_price']}}</p>
                    @endif
                    <p class="mb-3 font-normal text-xl text-gray-700">網路價: ${{$prod['price']}}</p>
                    <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">加入購物車</x-button>
                </div>
            </div>
        @endforeach
    </div>
</div>
