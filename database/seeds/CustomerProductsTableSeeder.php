<?php
use Illuminate\Database\Seeder;
class CustomerProductsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('customer_products'); } }
