<x-app-layout>
    <div class="bg-[#FEFCEC] flex flex-col items-center border border-gray-200 rounded-lg shadow mx-8 sm:mx-8 md:mx-12 lg:mx-12 xl:mx-12 2xl:mx-12 mt-4 md:flex-row">
        <div class="flex flex-col justify-between p-4 leading-normal w-2/5 xl:w-2/5 2xl:w-2/5">
            <img class="rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{$product->img}}" alt="">
        </div>
        <div class="flex-row w-3/5 h-full">
            <div class="flex flex-col p-4 leading-normal h-100">
                <h5 class="mb-4 text-2xl font-bold tracking-tight text-blue-600">{{$product->name}}</h5>
                <p class="mt-3 font-normal text-gray-700 overflow-hidden line-clamp-3">{{$product->describe}}</p>
            </div>
            <div class="mr-12 mt-48 mb-4 flex flex-col items-center justify-between px-4">
                @if($product->origin_price !== $product->price)
                    <p class="line-through mb-3 font-normal text-xl text-gray-700">原價: ${{$product->origin_price}}</p>
                    <p class="mb-3 font-normal text-xl text-gray-700">網路價: ${{$product->price}}</p>
                @else
                    <p class="mb-3 font-normal text-xl text-gray-700">網路價: ${{$product->price}}</p>
                @endif
                <form action="{{ route('add-cart') }}" method="post">
                    @csrf
                    <input type="hidden" name="product" value="{{$product->pchome_id}}">
                    <select name="quantity" class="right-0 bg-gray-50 z-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-md origin-top-right focus:ring-blue-500 focus:border-blue-500 block mt-2 w-full p-2.5">
                        <option value="0" disabled>0</option>
                        @for ($i = 1; $i <= 20; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <div>
                        庫存數量：{{$product->amount}}
                    </div>
                    @if($product->amount<=0)
                        <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg" disabled>
                            加入購物車
                        </x-button>
                    @else
                        <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                            加入購物車
                        </x-button>
                    @endif

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

