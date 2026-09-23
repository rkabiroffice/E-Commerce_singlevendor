<?php
use Illuminate\Database\Seeder;
class CustomerProductTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('customer_product_translations'); } }
