@php
    $payment = \App\Models\Payment::all();
@endphp
<x-app-layout>
    @livewire('cart-item-list', ['items'=> $cartItems])
        <div class="flex flex-row-reverse mt-12 mb-4">
            <div class="mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12 font-bold text-red-600">
                @livewire('cart-total-money')
            </div>
        </div>
    <div class="mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12">
        <form action="{{route('cart.buy')}}" method="post">
            @csrf
            <div class="mt-4">
                <x-label for="payment" value="{{ __('Payment Method') }}"/>
                <select id="payment" name="payment"
                        class="right-0 bg-gray-50 z-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-md origin-top-right focus:ring-blue-500 focus:border-blue-500 block mt-2 w-full p-2.5">
                    <option selected>Choose your payment method</option>
                    @foreach ($payment as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-label for="address" value="{{ __('Address') }}"/>
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                         required/>
            </div>
            <div class="flex flex-row-reverse">
                <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                    確認購買
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
