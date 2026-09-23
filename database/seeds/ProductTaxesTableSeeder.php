<?php
use Illuminate\Database\Seeder;
class ProductTaxesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('product_taxes'); } }
