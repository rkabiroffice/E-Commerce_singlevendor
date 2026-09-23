<?php
use Illuminate\Database\Seeder;
class CouponUsagesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('coupon_usages'); } }
