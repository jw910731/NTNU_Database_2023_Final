<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        <div class="flex flex-col mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12 mt-4">
            <div class="mt-1 text-2xl p-2 text-red-500 font-bold">
                您已完成此訂單！
            </div>
            <div class="bg-gray-200 p-2 border border-gray-200 rounded-lg">
                <div class="mt-1 text-2xl">
                    以下為購買清單：
                </div>
                @php
                    $buyRecords = \App\Models\BuyRecord::where('buy_history_id', $buyHistory->id)->get();
                    $total = 0;
                    $paymentName = \App\Models\Payment::where('id', $buyHistory->payment_id)->first()->name;
                    $cityName = \App\Models\City::where('id', $buyHistory->city_id)->first()->name;
                @endphp
                @foreach($buyRecords as $buyRecord)
                    @php
                        $prod = \App\Models\Product::where('Id', $buyRecord->product_id)->first();
                        $total += $prod['price'] * $buyRecord['quantity'];
                    @endphp
                    <div
                        class="bg-[#FEFCEC] flex flex-col items-center border border-gray-200 rounded-lg shadow md:flex-row mt-4 mx-2">
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
                            <p class="mb-3 font-normal text-xl text-gray-700">購買數量: x {{$buyRecord['quantity']}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12 mt-4 border border-gray-200 rounded-lg divide-y">
            <div class="flex flex-row flex-nowrap p-2 justify-between">
                <div class="w-1/2">
                    付款方式
                </div>
                <div class="w-1/2">
                    {{$paymentName}}
                </div>
            </div>
            <div class="flex flex-row flex-nowrap p-2 justify-between border">
                <div class="w-1/2">
                    總消費金額
                </div>
                <div class="w-1/2">
                    {{$total}}
                </div>
            </div>
            <div class="flex flex-row flex-nowrap p-2 justify-between">
                <div class="w-1/2">
                    送貨縣市
                </div>
                <div class="w-1/2">
                    {{$cityName}}
                </div>
            </div>
            <div class="flex flex-row flex-nowrap p-2 justify-between">
                <div class="w-1/2">
                    送貨地址
                </div>
                <div class="w-1/2">
                    {{$buyHistory['address']}}
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-end mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12">
            <a href="{{ route('dashboard') }}" class="text-blue-500">
                <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                    返回主頁繼續購物
                </x-button>
            </a>
        </div>
    </div>
</x-app-layout>
