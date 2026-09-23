<?php
use Illuminate\Database\Seeder;
class ProductQueriesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('product_queries'); } }
