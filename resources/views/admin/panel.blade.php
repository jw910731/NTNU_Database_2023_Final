<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        <div class="my-4 text-2xl">所有使用者的購買紀錄</div>
        <div class="overflow-y-auto max-h-[40rem]">
            <table class="table-fixed border-collapse border border-slate-400">
                <thead>
                <tr class="sticky top-0 bg-gray-300 border border-gray-200 rounded-lg">
                    <th class="p-2 border border-slate-300 w-[8rem]">購買人</th>
                    <th class="p-2 border border-slate-300">購買商品</th>
                    <th class="p-2 border border-slate-300 w-[8rem]">消費金額</th>
                    <th class="p-2 border border-slate-300 w-[8rem]">付款方式</th>
                    <th class="p-2 border border-slate-300 w-[8rem]">送貨地址</th>
                </tr>
                </thead>
                @foreach($buyHistoryList as $buyHistory)
                    <tr>
                        <td class="p-2 border border-slate-300 text-center">{{$buyHistory['user_name']}}</td>
                        <td class="p-2 border border-slate-300">
                            @foreach($buyHistory['products'] as $product)
                                <div>{{$product['name']}} x {{$product['quantity']}}</div>
                            @endforeach
                        </td>
                        <td class="p-2 border border-slate-300 text-center">
                            {{$buyHistory['total']}}
                        </td>
                        <td class="p-2 border border-slate-300 text-center">{{$buyHistory['payment']}}</td>
                        <td class="p-2 border border-slate-300 text-center">{{$buyHistory['address']}}</td>
                    </tr>
                @endforeach
                <tbody>
            </table>
        </div>
        <div class="my-4 text-2xl">所有使用者的瀏覽商品紀錄</div>
        <div class="overflow-y-auto max-h-[40rem]">
            <table class="table-fixed border-collapse border border-slate-400 w-full">
                <thead>
                <tr class="sticky top-0 bg-gray-300 border border-gray-200 rounded-lg">
                    <th class="p-2 border border-slate-300 w-[8rem]">瀏覽者</th>
                    <th class="p-2 border border-slate-300 ">瀏覽商品</th>
                    <th class="p-2 border border-slate-300 w-[12rem]">瀏覽時間</th>
                </tr>
                </thead>
                @foreach($viewProductList as $viewProduct)
                    <tr>
                        <td class="p-2 border border-slate-300 text-center">{{$viewProduct['user_name']}}</td>
                        <td class="p-2 border border-slate-300">{{$viewProduct['product_name']}}</td>
                        <td class="p-2 border border-slate-300 text-center">{{$viewProduct['time']}}</td>
                    </tr>
                @endforeach
                <tbody>
            </table>
        </div>
        <div class="my-4 text-2xl">所有使用者的搜尋紀錄</div>
        <div class="overflow-y-auto max-h-[40rem]">
            <table class="table-auto border-collapse border border-slate-400 w-full">
                <thead>
                <tr class="sticky top-0 bg-gray-300 border border-gray-200 rounded-lg">
                    <th class="p-2 border border-slate-300 w-[8rem]">搜尋者</th>
                    <th class="p-2 border border-slate-300">Keyword</th>
                    <th class="p-2 border border-slate-300 w-[12rem]">搜尋時間</th>
                </tr>
                </thead>
                @foreach($searchHistoryList as $searchHistory)
                    <tr>
                        <td class="p-2 border border-slate-300 text-center">{{$searchHistory['user_name']}}</td>
                        <td class="p-2 border border-slate-300 text-center">{{$searchHistory['keyword']}}</td>
                        <td class="p-2 border border-slate-300 text-center">{{$searchHistory['time']}}</td>
                    </tr>
                @endforeach
                <tbody>
            </table>
        </div>
    </div>
</x-app-layout>
