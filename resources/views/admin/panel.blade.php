<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        <div>所有使用者的購買紀錄</div>
        <table class="table-auto border-collapse border border-slate-400">
            <thead>
            <tr>
                <th class="border border-slate-300">購買人</th>
                <th class="border border-slate-300">購買商品</th>
                <th class="border border-slate-300">消費金額</th>
                <th class="border border-slate-300">付款方式</th>
                <th class="border border-slate-300">送貨地址</th>
            </tr>
            </thead>
            @foreach($buyHistoryList as $buyHistory)
                <tr>
                    <td class="border border-slate-300">{{$buyHistory['user_name']}}</td>
                    <td class="border border-slate-300">
                        @foreach($buyHistory['products'] as $product)
                            <div>{{$product['name']}} x {{$product['quantity']}}</div>
                        @endforeach
                    </td>
                    <td class="border border-slate-300">{{$buyHistory['total']}}</td>
                    <td class="border border-slate-300">{{$buyHistory['payment']}}</td>
                    <td class="border border-slate-300">{{$buyHistory['address']}}</td>
                </tr>
            @endforeach
            <tbody>
        </table>

        <div>所有使用者的瀏覽商品紀錄</div>
        <table class="table-auto border-collapse border border-slate-400">
            <thead>
            <tr>
                <th class="border border-slate-300">瀏覽者</th>
                <th class="border border-slate-300">瀏覽商品</th>
                <th class="border border-slate-300">瀏覽時間</th>
            </tr>
            </thead>
            @foreach($viewProductList as $viewProduct)
                <tr>
                    <td class="border border-slate-300">{{$viewProduct['user_name']}}</td>
                    <td class="border border-slate-300">{{$viewProduct['product_name']}}</td>
                    <td class="border border-slate-300">{{$viewProduct['time']}}</td>
                </tr>
            @endforeach
            <tbody>
        </table>
    </div>
</x-app-layout>
