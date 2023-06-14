@php
    $payment = \App\Models\Payment::all();
    $cartItems = \App\Models\CartItem::all();
@endphp
<x-app-layout>
    @foreach($cartItems as $item)
        @php
            $prod = \App\Models\Product::where('Id', $item->product_id)->first();
        @endphp
        <div
            class="bg-[#FEFCEC] flex flex-col items-center border border-gray-200 rounded-lg shadow md:flex-row mt-4 mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12">
            <div class="flex flex-col justify-between p-4 leading-normal w-1/3 xl:w-1/5 2xl:w-1/5">
                <a href="{{route('product.show', ["product"=>$prod['pchome_id']])}}" target="_blank">
                    <img
                        class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="{{$prod['img']}}" alt="">
                </a>
            </div>
            <div class="flex flex-col p-4 leading-normal w-1/3 xl:w-3/5 2xl:w-3/5">
                <a href="{{route('product.show', ["product"=>$prod['pchome_id']])}}" target="_blank">
                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-blue-600 hover:underline">{{$prod['name']}}</h5>
                </a>
            </div>
            <div class="flex flex-col items-center justify-between px-4 w-1/3 xl:w-1/5 2xl:w-1/5">
                <p class="mb-3 font-normal text-xl text-gray-700">購買價格: $ {{$prod['price']}}</p>
                <p class="mb-3 font-normal text-xl text-gray-700">購買數量: x {{$item['quantity']}}</p>
            </div>
        </div>
    @endforeach
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
