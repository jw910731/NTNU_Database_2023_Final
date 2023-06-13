@php
    $payment = \App\Models\Payment::all();
@endphp
<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        @foreach ($cartItems as $cartItem)
            <div class="flex flex-col p-4 leading-normal w-1/3 xl:w-3/5 2xl:w-3/5">
                <h5 class="mb-4 text-2xl font-bold tracking-tight">{{$cartItem["product"]["name"]}}</h5>
            </div>
            <div class="flex flex-col items-center justify-between px-4 w-1/3 xl:w-1/5 2xl:w-1/5">
                @if($cartItem["product"]['origin_price'] !== $cartItem["product"]['price'])
                    <p class="mb-3 font-normal text-xl text-gray-700">原價: ${{$cartItem["product"]['origin_price']}}</p>
                @endif
                <p class="mb-3 font-normal text-xl text-gray-700">網路價: ${{$cartItem["product"]['price']}}</p>
                <p>
                    購買數量：{{$cartItem->quantity}}
                </p>
                
            </div>
        @endforeach
        <div  class="flex flex-row-reverse mt-12 mb-4">
            @livewire('cart-total-money')
        </div>
        
        <div class="mt-4">
            <x-label for="payment_id" value="{{ __('Payment Method') }}" />
            <select id="payment_id" name="payment_id" class="right-0 bg-gray-50 z-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-md origin-top-right focus:ring-blue-500 focus:border-blue-500 block mt-2 w-full p-2.5">
                <option selected>Choose your payment method</option>
                @foreach ($payment as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-row-reverse">
            <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                確認購買
            </x-button>
        </div>
    </div>
</x-app-layout>
