<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CouponModel;


class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couponRecords = [
            ["id" => 1, 'coupon_option' => 'Manual', 'coupon_code' => 'test10', 'categories' => '1,2', 'users' => 'kodenatan17@gmail.com,sedjoek.id@gmail.com', 'coupon_type' => 'Single', 'amount_type' => 'Percentage', 'amount' => '10', 'expiry_date' => '2022-12-12','status'=>1]
        ];

        CouponModel::insert($couponRecords);
    }
}
