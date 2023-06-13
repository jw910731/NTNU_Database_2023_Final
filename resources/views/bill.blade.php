<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        <div>購買成功！！ 返回
            <a href="{{ route('dashboard') }}" class="text-blue-500">Dashboard</a>
            繼續購物
        </div>
        <div>以下為購買清單：</div>
        @php
            $buyRecords = \App\Models\BuyRecord::where('buy_history_id', $buyHistory->id)->get();
            $total = 0;
            $paymentName = \App\Models\Payment::where('id', $buyHistory->payment_id)->first()->name;
        @endphp
        @foreach($buyRecords as $buyRecord)
            @php
                $prod = \App\Models\Product::where('Id', $buyRecord->product_id)->first();
                $total += $prod['price'] * $buyRecord['quantity'];
            @endphp
            <div
                class="bg-[#FEFCEC] flex flex-col items-center border border-gray-200 rounded-lg shadow md:flex-row mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12 mt-4">
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
        <div>
            <p>付款方式：{{$paymentName}}</p>
            <p>總消費金額：{{$total}}</p>
            <p>送貨地址：{{$buyHistory['address']}}</p>
        </div>
    </div>
</x-app-layout>
