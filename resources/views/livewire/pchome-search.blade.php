<div>

    <div class="p-4 bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg">
        <form class="flex w-full" wire:submit.prevent="requestPCHome">
            <x-input wire:model.defer="search" class="w-11/12 h-8 p-4" />
            <div class="flex-1"></div>
            <x-button>Search</x-button>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-full">
            @foreach ($result as $prod)
                <div  class="flex flex-col bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                    <a href="#">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://cs-d.ecimg.tw/{{$prod['picS']}}" alt="">
                    </a>
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <a href="">
                            <h5 class="mt-4 text-2xl font-bold tracking-tight text-blue-600 hover:underline">{{$prod['name']}}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">網路價: ${{$prod['originPrice']}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
</div>
