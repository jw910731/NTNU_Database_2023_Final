<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        @foreach($items as $item)
            <livewire:shopping-cart :item="$item" wire:key="items-{{$item->id}}" />
        @endforeach
        <div class="flex flex-row-reverse">
            @livewire('cart-total-money')
            <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                去結帳
            </x-button>
        </div>
    </div>
</x-app-layout>
