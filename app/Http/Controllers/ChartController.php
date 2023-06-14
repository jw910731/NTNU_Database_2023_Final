<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
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
                        'address' => $buyHistory->address,
                        'total'=> $total,
                    ];
                }
            }
        }
        return view('admin.panel', [
            'buyHistoryList' => $buyHistoryList,
        ]);
    }
}
