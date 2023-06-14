<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SearchBar extends Component
{
    public $searchHistory = [];
    public string $keyword;

    public function updatedKeyword(): void
    {
        $this->searchHistory = Auth::user()->searchHistory()
            ->select('keyword')
            ->where('keyword', 'LIKE', '%'.$this->keyword.'%')
            ->distinct()
            ->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
