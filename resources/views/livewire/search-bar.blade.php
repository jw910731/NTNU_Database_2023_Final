<div>
    <form>
        <div class="flex flex-col">
            <div class="flex flex-row">
                <x-input wire:model="keyword" name="keyword" class="w-11/12 h-8 p-4"
                         value="{{ $keyword }}" required/>
                <div class="flex-1"></div>
                <x-button class="ml-4" type="submit">{{__("Search")}}</x-button>
            </div>
        </div>
    </form>
    <div class="bg-white mt-2 rounded-md">
        @foreach ($searchHistory as $item)
            <div wire:key="search-suggest-{{ $loop->index }}" class="flex flex-col hover:text-blue-500 active:text-blue-700 hover:bg-gray-200 active:bg-gray-100 rounded-md my-0.5">
                <div class="ml-4 rounded-md">
                    <a href="{{ route('dashboard', ['keyword' => $item->keyword]) }}">
                        {{ $item->keyword }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
