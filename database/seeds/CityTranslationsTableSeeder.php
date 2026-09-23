<?php
use Illuminate\Database\Seeder;
class CityTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('city_translations'); } }
