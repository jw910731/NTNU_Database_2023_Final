<div>
    <x-slot name="header">
        <div class="p-4 bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex w-full">
                <x-input type="text" wire:model="search" class="w-11/12 h-8 p-4" />
                <div class="flex-1"></div>
                <x-button wire:click.prevent="requestPCHome">Search</x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>{{dump($search)}}</div>
            @if(!$search)
            <div class="w-full">
                @foreach ($result as $prod)
{{--                    {{$id}} = {{$prod['Id']}}--}}
{{--                    {{$name}} = {{$prod['Name']}}--}}
{{--                    {{$Pics}} = {{$prod['Pics']}}--}}
{{--                    {{$Price}} = {{$prod['Price']}}--}}
{{--                    {{$OriginPrice}} = {{$prod['OriginPrice']}}--}}
                    <div> {{$prod['Id']}} </div>
                    <div> {{$prod['Name']}} </div>
                    <div> {{$prod['Pics']}} </div>
                    <div> {{$prod['Price']}} </div>
                    <div> {{$prod['OriginPrice']}} </div>

{{--                    <div  class="flex flex-col bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">--}}
{{--                        <a href="#">--}}
{{--                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="" alt="">--}}
{{--                        </a>--}}
{{--                        <div class="flex flex-col justify-between p-4 leading-normal">--}}
{{--                            <a href="">--}}
{{--                                <h5 class="mt-4 text-2xl font-bold tracking-tight text-blue-600 hover:underline">{{$prod['Name']}}</h5>--}}
{{--                            </a>--}}
{{--                            <p class="mb-3 font-normal text-gray-700">網路價: ${{$prod['OriginPrice']}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
