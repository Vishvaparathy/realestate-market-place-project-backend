<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subscription_plans')->insertOrIgnore([
            [
                'name' => 'Free',
                'listing_limit' => 5,
                'is_featured' => false,
                'price' => 0,
                'validity_days' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Premium',
                'listing_limit' => 100,
                'is_featured' => true,
                'price' => 2000, // LKR
                'validity_days' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
