<?php
use Illuminate\Database\Seeder;
class PageTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('page_translations'); } }
