<?php
use Illuminate\Database\Seeder;
class CategoryTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('category_translations'); } }
