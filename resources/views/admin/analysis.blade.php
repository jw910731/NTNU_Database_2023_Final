<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 pd-8">
        <div class="text-2xl font-bold my-4">各年齡層最喜歡的商品種類</div>
        <table class="table-auto border-collapse border border-slate-400">
            <thead>
            <tr>
                <th class="border border-slate-300">年齡層</th>
                <th class="border border-slate-300">商品種類(多到少, 最多五個)</th>
            </tr>
            </thead>
            @foreach($ageToCategoryList as $key => $list)
                @if(!$list->isEmpty())
                    <tr>
                        <td class="border border-slate-300">
                            {{$key*10 + 1}} ~ {{($key+1)*10}}
                        </td>
                        <td class="border border-slate-300">
                            {{join('/', array_map(function ($e) {return $e->main_category;}, $list->toArray()))}}
                        </td>
                    </tr>
                @endif
            @endforeach
            <tbody>
        </table>

        <div class="text-2xl font-bold my-4">各地區總消費金額</div>
        <table class="table-auto border-collapse border border-slate-400">
            <thead>
            <tr>
                <th class="border border-slate-300">地區</th>
                <th class="border border-slate-300">總消費金額</th>
                <th class="border border-slate-300">消費最高地區</th>
            </tr>
            </thead>
            @foreach($cityToMoneyList as $cityToMoney)
                @if($cityToMoney->total)
                    <tr>
                        <td class="border border-slate-300">
                            {{$cityToMoney->name}}
                        </td>
                        <td class="border border-slate-300">
                            {{$cityToMoney->total}}
                        </td>
                        @if($cityToMoney->total === max($cityToMoneyList->pluck('total')->toArray()))
                            <td class="border border-slate-300">√</td>
                        @else
                            <td class="border border-slate-300"></td>
                        @endif
                    </tr>
                @endif
            @endforeach
            <tbody>
        </table>
    </div>
</x-app-layout>
