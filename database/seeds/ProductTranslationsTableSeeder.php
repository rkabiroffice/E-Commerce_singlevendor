<?php
use Illuminate\Database\Seeder;
class ProductTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('product_translations'); } }
