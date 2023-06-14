<x-app-layout>
    <div>
        <div class="mx-auto mt-8 w-2/3 p-4 bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg">
            <form>
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <x-input name="keyword" class="w-11/12 h-8 p-4"
                                 value="{{ app('request')->input('keyword') ?? '' }}" required/>
                        <div class="flex-1"></div>
                        <x-button class="ml-4" type="submit">{{__("Search")}}</x-button>
                    </div>
                    <div class="bg-white mt-2 rounded-md">
                        <div class="">
                            @if($searchHistory)
                                <div>
                                    @foreach ($searchHistory as $item)
                                        <div
                                            class="flex flex-col hover:text-blue-500 active:text-blue-700 hover:bg-gray-200 active:bg-gray-100  rounded-md my-0.5">
                                            <div class="ml-4  rounded-md">
                                                <a href="{{ route('dashboard', ['keyword' => $item->keyword]) }}">
                                                    {{ $item->keyword }}
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if($error)
            <div id="alert-2"
                 class="w-2/3 mt-12 mx-auto flex p-4 mb-4 text-red-800 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-red-400"
                 role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{__("Product not found. Please refresh the page and try again.")}}
                </div>
            </div>
        @else
            <div class="w-4/5 py-12 mx-auto sm:px-6 lg:px-8">
                @foreach ($result as $prod)
                    <div
                        class="bg-[#FEFCEC] flex flex-col items-center border border-gray-200 rounded-lg shadow md:flex-row mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12 mt-4">
                        <div class="flex flex-col justify-between p-4 leading-normal w-1/3 xl:w-1/5 2xl:w-1/5">
                            <a href="{{route('product.show', ["product"=>$prod->pchome_id])}}" target="_blank">
                                <img
                                    class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                    src="{{$prod['img']}}" alt="">
                            </a>
                        </div>
                        <div class="flex flex-col p-4 leading-normal w-1/3 xl:w-3/5 2xl:w-3/5">
                            <a href="{{route('product.show', ["product"=>$prod->pchome_id])}}" target="_blank">
                                <h5 class="mb-4 text-2xl font-bold tracking-tight text-blue-600 hover:underline">{{$prod->name}}</h5>
                            </a>
                            <p class="mt-3 font-normal text-gray-700 overflow-hidden line-clamp-3">{{$prod->describe}}</p>
                        </div>
                        <div class="my-4 flex flex-col items-center justify-between px-4 w-1/3 xl:w-1/5 2xl:w-1/5">
                            @if($prod->origin_price !== $prod->price)
                                <p class="mb-3 font-normal text-xl text-gray-700">原價: ${{$prod->origin_price}}</p>
                            @endif
                            <p class="mb-3 font-normal text-xl text-gray-700">網路價: ${{$prod->price}}</p>

                            <form action="{{ route('add-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="product" value="{{$prod->Id}}">
                                <select name="quantity"
                                        class="right-0 bg-gray-50 z-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-md origin-top-right focus:ring-blue-500 focus:border-blue-500 block mt-2 w-full p-2.5">
                                    <option value="0" disabled>0</option>
                                    @for ($i = 1; $i <= $prod->amount; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <div>
                                    庫存數量：{{$prod->amount}}
                                </div>
                                @if($prod->amount<=0)
                                    <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg"
                                              disabled>
                                        商品補貨中
                                    </x-button>
                                @else
                                    <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                                        加入購物車
                                    </x-button>
                                @endif
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
