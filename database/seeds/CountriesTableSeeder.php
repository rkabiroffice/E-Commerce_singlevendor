<?php
use Illuminate\Database\Seeder;
class CountriesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('countries'); } }
