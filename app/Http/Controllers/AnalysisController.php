<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Illuminate\Events\queueable;

class AnalysisController extends Controller
{
    protected function ageToCategories()
    {
        $ageToCategoryList = array();
        $min_age = User::min('age');
        $max_age = User::max('age');

        for ($i = intval($min_age/10); $i <= intval($max_age/10); $i++) {
            $sub = DB::table('buy_records')
                ->selectRaw('categories.main_category AS main_category')
                ->selectRaw('COUNT(main_category) AS count')
                ->join('products', 'products.id', '=', 'buy_records.product_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('buy_histories', 'buy_histories.id', '=', 'buy_records.buy_history_id')
                ->join('users', 'users.id', '=', 'buy_histories.user_id')
                ->whereBetween('users.age', [$i * 10 + 1, ($i + 1) * 10])
                ->groupBy('categories.main_category');
            $result = DB::table( DB::raw("({$sub->toSql()}) AS sub") )
                ->mergeBindings($sub)
                ->orderByDesc('sub.count')
                ->limit(5)
                ->get();
            $ageToCategoryList[$i] = $result;
        }
        return $ageToCategoryList;
    }

    public function index()
    {
        return view('admin.analysis', [
            'ageToCategoryList' => $this->ageToCategories()
        ]);
    }
}
