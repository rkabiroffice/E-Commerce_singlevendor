<?php
use Illuminate\Database\Seeder;
class ProductsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('products'); } }
