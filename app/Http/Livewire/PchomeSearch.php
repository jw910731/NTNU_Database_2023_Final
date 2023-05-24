<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class PchomeSearch extends Component
{
    public string $search = "";
    public $result = [];
    public function requestPCHome(): void
    {
        $response = Http::get('https://ecshweb.pchome.com.tw/search/v3.3/all/results', [
            'q' => $this->search,
            'page' => 1,
            'sort'=>'sale/dc'
        ])->json();
        $this->result = $response['prods'];
    }
    public function render()
    {
        return view('livewire.pchome-search');
    }
}
