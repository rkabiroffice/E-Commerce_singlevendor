<?php
use Illuminate\Database\Seeder;
class BrandTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('brand_translations'); } }
