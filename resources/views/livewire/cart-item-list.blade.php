<div>
    @foreach($items as $item)
        <livewire:shopping-cart :item="$item" wire:key="items-{{$item->id}}" />
    @endforeach
</div>
