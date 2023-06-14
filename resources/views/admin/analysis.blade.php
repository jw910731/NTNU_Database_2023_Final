<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 pd-8">
        <div class="text-2xl font-bold my-4">各年齡層最喜歡的商品種類</div>
        <table class="table-auto border-collapse border border-slate-400">
            <thead>
            <tr>
                <th class="border border-slate-300">年齡層</th>
                <th class="border border-slate-300">商品種類</th>
            </tr>
            </thead>
            @for($i=0; $i<count($ageToCategoryList); $i++)
                <tr>
                    <td class="border border-slate-300">
                        {{$i*10}} ~ {{($i+1)*10}}
                    </td>
                    <td>
                        @foreach($ageToCategoryList[$i] as $category)
                            @if(!$loop->first)
                                /
                            @endif
                            {{$category}}
                        @endforeach
                    </td>
                </tr>
            @endfor
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
