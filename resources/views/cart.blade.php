<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        @livewire('cart-item-list', ['items'=> $items])
        <div class="flex flex-row-reverse">
            @livewire('cart-total-money')
            <a href="{{route('payment')}}">
                <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                    去結帳
                </x-button>
            </a>
        </div>
    </div>
</x-app-layout>
