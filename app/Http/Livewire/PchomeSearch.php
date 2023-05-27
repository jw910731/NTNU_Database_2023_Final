<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class PchomeSearch extends Component
{
    public string $search = "";
    public $result = [];
    public bool $isNullSearch = false;
    public function requestPCHome(): void
    {
        $response = Http::get('https://ecshweb.pchome.com.tw/search/v3.3/all/results', [
            'q' => $this->search,
            'page' => 1,
            'sort'=>'sale/dc'
        ])->json();
        if(is_null($response) || !key_exists('prods',$response))
        {
            $this->isNullSearch = true;
            return;
        }
        $this->result = $response['prods'];
        for($i=0;$i<count($this->result);$i++){
            $product = new Product;
            $product->pchome_id = $this->result[$i]["Id"];
            $product->name = $this->result[$i]["name"];
            $product->describe = $this->result[$i]["describe"];
            $product->img = "https://cs-d.ecimg.tw" . $this->result[$i]["picB"];
            $product->price = $this->result[$i]["price"];
            $product->origin_price = $this->result[$i]["originPrice"];
            if (!Product::where('pchome_id', $product->pchome_id)->exists()) {
                $product->save();
            }
            $this->result[$i]["pchome_id"] = $product->pchome_id;
            $this->result[$i]["img"] = $product->img;
            $this->result[$i]["origin_price"] = $product->origin_price;
        }
    }
    public function render()
    {
        return view('livewire.pchome-search');
    }
}
