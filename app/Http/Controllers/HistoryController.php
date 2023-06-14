<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    protected function getBuyHistoryList()
    {
        $buyHistoryList = [];
        $users = User::all();
        foreach ($users as $user) {
            if (count($user->buyHistory) > 0) {
                foreach ($user->buyHistory as $buyHistory) {
                    $product = [];
                    $total = 0;
                    foreach ($buyHistory->buyRecord as $buyRecord) {
                        $product[] = [
                            'name' => $buyRecord->product->name,
                            'quantity' => $buyRecord->quantity,
                        ];
                        $total += $buyRecord->product->price * $buyRecord->quantity;
                    }
                    $buyHistoryList[] = [
                        'user_name' => $user->name,
                        'products' => $product,
                        'payment' => $buyHistory->payment->name,
                        'city' => $buyHistory->city->name,
                        'address' => $buyHistory->address,
                        'total' => $total,
                    ];
                }
            }
        }
        return $buyHistoryList;
    }

    public function getViewProductList()
    {
        $viewProductList = [];
        $users = User::all();
        foreach ($users as $user) {
            if (count($user->productView) > 0) {
                foreach ($user->productView as $productView) {
                    $viewProductList[] = [
                        'user_name' => $user->name,
                        'product_name' => $productView->product->name,
                        'time' => $productView->created_at,
                    ];
                }
            }
        }
        return $viewProductList;
    }

    public function getSearchHistoryList()
    {
        $searchHistoryList = [];
        $users = User::all();
        foreach ($users as $user) {
            if (count($user->searchHistory) > 0) {
                foreach ($user->searchHistory as $searchHistory) {
                    $searchHistoryList[] = [
                        'user_name' => $user->name,
                        'keyword' => $searchHistory->keyword,
                        'time' => $searchHistory->created_at,
                    ];
                }
            }
        }
        return $searchHistoryList;
    }

    public function index()
    {
        return view('admin.history', [
            'buyHistoryList' => $this->getBuyHistoryList(),
            'viewProductList' => $this->getViewProductList(),
            'searchHistoryList' => $this->getSearchHistoryList(),
        ]);
    }
}
