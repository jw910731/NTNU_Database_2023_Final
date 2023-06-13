<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        @livewire('cart-item-list', ['items'=> $items])
        <div class="flex flex-nowrap justify-between items-end mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12">
            <div class="font-bold text-red-500 text-xl">
                @livewire('cart-total-money')
            </div>
            <a href="{{route('payment')}}">
                <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                    去結帳
                </x-button>
            </a>
        </div>
    </div>
</x-app-layout>
