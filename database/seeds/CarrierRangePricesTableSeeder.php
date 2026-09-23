<?php
use Illuminate\Database\Seeder;
class CarrierRangePricesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('carrier_range_prices'); } }
