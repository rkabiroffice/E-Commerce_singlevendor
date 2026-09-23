<?php
use Illuminate\Database\Seeder;
class WholesalePricesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('wholesale_prices'); } }
