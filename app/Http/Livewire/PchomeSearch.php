<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PchomeSearch extends Component
{
    public string $search = "";
    public array $result = [];
    public function mount()
    {
        $this->search = "Fucked";
    }
    public function requestPCHome(): void
    {
        $response = Http::get('https://ecshweb.pchome.com.tw/search/v3.3/all/results', [
            'q' => $this->search,
            'page' => 1,
            'sort'=>'sale/dc'
        ]);
        dump($response);
//        $this->result =!! $response ? $response->json('prods') : [];
    }
    public function render()
    {
        dump($this->result);
        return view('livewire.pchome-search');
    }
}
