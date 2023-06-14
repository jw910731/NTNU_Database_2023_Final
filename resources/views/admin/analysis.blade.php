<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 pd-8 w-full">
        <div class="text-2xl font-bold my-4">各年齡層最喜歡的商品種類</div>
        <div class="overflow-y-auto max-h-[40rem]">
            <table class="table-fixed border-collapse border border-slate-400 w-full">
                <thead>
                <tr class="sticky top-0 bg-gray-400 border border-gray-200 rounded-lg">
                    <th class="p-2 border border-slate-300 w-[8rem]">年齡層</th>
                    <th class="p-2 border border-slate-300 w-[8rem]">商品種類(多到少, 最多五個)</th>
                </tr>
                </thead>
                @foreach($ageToCategoryList as $key => $list)
                    @if(!$list->isEmpty())
                        <tr>
                            <td class="p-2 border border-slate-300 text-center">
                                {{$key*10 + 1}} ~ {{($key+1)*10}}
                            </td>
                            <td class="p-2 border border-slate-300 text-center">
                                {{join('/', array_map(function ($e) {return $e->main_category;}, $list->toArray()))}}
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tbody>
            </table>
        </div>
        <div class="text-2xl font-bold my-4">各地區總消費金額</div>
        <div class="overflow-y-auto max-h-[40rem]">
            <table class="table-auto border-collapse border border-slate-400 w-full">
                <thead>
                <tr class="sticky top-0 bg-gray-400 border border-gray-200 rounded-lg">
                    <th class="p-2 border border-slate-300 w-[8rem]">地區</th>
                    <th class="p-2 border border-slate-300 w-[8rem]">總消費金額</th>
                    <th class="p-2 border border-slate-300 w-[8rem]">消費最高地區</th>
                </tr>
                </thead>
                @foreach($cityToMoneyList as $cityToMoney)
                    @if($cityToMoney->total)
                        <tr>
                            <td class="p-2 border border-slate-300 text-center">
                                {{$cityToMoney->name}}
                            </td>
                            <td class="p-2 border border-slate-300 text-center">
                                {{$cityToMoney->total}}
                            </td>
                            @if($cityToMoney->total === max($cityToMoneyList->pluck('total')->toArray()))
                                <td class="p-2 border border-slate-300 text-center">√</td>
                            @else
                                <td class="p-2 border border-slate-300 text-center"></td>
                            @endif
                        </tr>
                    @endif
                @endforeach
                <tbody>
            </table>
        </div>
    </div>
</x-app-layout>
