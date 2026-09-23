<?php
use Illuminate\Database\Seeder;
class ProductStocksTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('product_stocks'); } }
