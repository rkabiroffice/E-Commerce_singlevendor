<?php
use Illuminate\Database\Seeder;
class AppTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('app_translations'); } }
