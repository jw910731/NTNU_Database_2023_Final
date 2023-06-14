<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    protected function ageToCategories()
    {
        $ageToCategoryList = array_fill(0, 12, array());
        for ($i = 0; $i < count($ageToCategoryList); $i++) {
            $ageToCategoryList[$i][] = "OAO";
            $ageToCategoryList[$i][] = "OAO";
            $ageToCategoryList[$i][] = "OAO";
        }
        return $ageToCategoryList;
    }

    protected function cityToMoney()
    {
        $cityToMoneyList = DB::table('cities')
            ->leftJoin('buy_histories', 'cities.id', '=', 'buy_histories.city_id')
            ->leftJoin('buy_records', 'buy_histories.id', '=', 'buy_records.buy_history_id')
            ->leftJoin('products', 'buy_records.product_id', '=', 'products.id')
            ->select('cities.name', DB::raw('sum(products.price * buy_records.quantity) as total'))
            ->groupBy('cities.name')
            ->get();
        return $cityToMoneyList;
    }

    public function index()
    {
        return view('admin.analysis', [
            'ageToCategoryList' => $this->ageToCategories(),
            'cityToMoneyList' => $this->cityToMoney()
        ]);
    }
}
