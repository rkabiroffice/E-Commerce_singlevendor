<?php
use Illuminate\Database\Seeder;
class CurrenciesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('currencies'); } }
