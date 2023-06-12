<div  class="bg-[#FEFCEC] flex flex-col items-center border border-gray-200 rounded-lg shadow md:flex-row mx-8 sm:mx-8 md:mx-12 lg:m-x12 xl:mx-12 2xl:mx-12 mt-4">
    <div class="flex flex-col justify-between p-4 leading-normal w-1/3 xl:w-1/5 2xl:w-1/5">
        <a href="{{route('product.show', ["product"=>$item["product"]["pchome_id"]])}}" target="_blank">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$item["product"]["img"]}}" alt="">
        </a>
    </div>
    <div class="flex flex-col p-4 leading-normal w-1/3 xl:w-3/5 2xl:w-3/5">
        <a href="{{route('product.show', ["product"=>$item["product"]["pchome_id"]])}}" target="_blank">
            <h5 class="mb-4 text-2xl font-bold tracking-tight text-blue-600 hover:underline">{{$item["product"]["name"]}}</h5>
        </a>
        <p class="mt-3 font-normal text-gray-700 overflow-hidden line-clamp-3">{{$item["product"]['describe']}}</p>
    </div>
    <div class="flex flex-col items-center justify-between px-4 w-1/3 xl:w-1/5 2xl:w-1/5">
        @if($item["product"]['origin_price'] !== $item["product"]['price'])
            <p class="mb-3 font-normal text-xl text-gray-700">原價: ${{$item["product"]['origin_price']}}</p>
        @endif
        <p class="mb-3 font-normal text-xl text-gray-700">網路價: ${{$item["product"]['price']}}</p>
        <select wire:model="item.quantity" wire:change="saveItem">
            <option value="0">0</option>
            @for ($i = 1; $i <= min(20, $item->product->amount); $i++)
                <option value="{{$i}}" wire:key="quantity-option-{{$i}}">{{$i}}</option>
            @endfor
        </select>
        <a wire:click="removeItem({{ $item }})">
            <x-button class="mt-4 h-12 text-center rounded-lg md:rounded-lg md:rounded-lg">
                刪除商品
            </x-button>
        </a>
    </div>
</div>
