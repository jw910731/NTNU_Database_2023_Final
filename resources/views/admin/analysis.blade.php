<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        <div>各年齡層最喜歡購買的商品種類</div>
{{--        {{dd($ageToCategoryList)}}--}}
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
    </div>
</x-app-layout>
