<?php

namespace App\Http\Controllers;

use App\Models\BuyHistory;
use App\Models\Category;
use App\Models\Occupation;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Illuminate\Events\queueable;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    private $demoSql = array();

    protected function ageToCategories()
    {

        $ageToCategoryList = array();
        $min_age = User::min('age');
        $max_age = User::max('age');

        for ($i = intval($min_age / 10); $i <= intval($max_age / 10); $i++) {
            $sub = DB::table('buy_records')
                ->selectRaw('categories.main_category AS main_category')
                ->selectRaw('COUNT(main_category) AS count')
                ->join('products', 'products.id', '=', 'buy_records.product_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('buy_histories', 'buy_histories.id', '=', 'buy_records.buy_history_id')
                ->join('users', 'users.id', '=', 'buy_histories.user_id')
                ->whereBetween('users.age', [$i * 10 + 1, ($i + 1) * 10])
                ->groupBy('categories.main_category');
            $result = DB::table(DB::raw("({$sub->toSql()}) AS sub"))
                ->mergeBindings($sub)
                ->orderByDesc('sub.count')
                ->limit(5);
            $ageToCategoryList[$i] = $result->get();
            $this->demoSql["age"] = $result->toSql();
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
            ->groupBy('cities.name');
        $this->demoSql["city"] = $cityToMoneyList->toSql();
        return $cityToMoneyList->get();
    }

    protected function buyTime()
    {
        $buyTimeList = BuyHistory::selectRaw('HOUR(created_at) div 2 AS created_bihour')
            ->selectRaw('COUNT(created_at) AS count')
            ->groupBy('created_at');
        $this->demoSql["time"] = $buyTimeList->toSql();
        $ret = array_fill(0, 12, 0);
        foreach ($buyTimeList->get() as $list) {
            $ret[$list->created_bihour] = $list->count;
        }

        return $ret;
    }

    protected function occupationToCategory()
    {

        $occupationToCategoryList = array();

        $occupations = Occupation::all();
        foreach ($occupations as $occupation) {
            $sub = DB::table('buy_records')
                ->selectRaw('categories.main_category AS main_category')
                ->selectRaw('COUNT(main_category) AS count')
                ->join('products', 'products.id', '=', 'buy_records.product_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('buy_histories', 'buy_histories.id', '=', 'buy_records.buy_history_id')
                ->join('users', 'users.id', '=', 'buy_histories.user_id')
                ->where('users.occupation_id', '=', $occupation->id)
                ->groupBy('categories.main_category');
            $result = DB::table(DB::raw("({$sub->toSql()}) AS sub"))
                ->mergeBindings($sub)
                ->orderByDesc('sub.count')
                ->limit(5);
            $occupationToCategoryList[$occupation->id] = $result->get();
            $this->demoSql["occupation"] = $result->toSql();
        }
        return $occupationToCategoryList;
    }

    public function index()
    {
        return view('admin.analysis', [
            'ageToCategoryList' => $this->ageToCategories(),
            'cityToMoneyList' => $this->cityToMoney(),
            'buyTimeList' => $this->buyTime(),
            'occupationToCategoryList' => $this->occupationToCategory(),
            'sql' => $this->demoSql,
        ]);
    }
}
