<x-app-layout>
    <div class="max-w-5xl mx-auto my-8">
        <div>各年齡層最喜歡的商品種類</div>
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
    </div>
</x-app-layout>
