<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment = [
            'Line Pay', 'Apple Pay', 'Google Pay', 'Samsung Pay', 'Taiwan Pay',
            '街口支付', '支付寶', 'PayPal', '信用卡', '超商代碼',
            'ATM轉帳', '超商取貨付款', '貨到付款', '分期付款', '腎臟'
        ];
        foreach($payment as $pay) {
            \App\Models\Payment::insert([
                'name' => $pay
            ]);
        }
    }
}
