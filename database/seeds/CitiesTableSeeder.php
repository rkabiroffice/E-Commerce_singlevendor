<?php
use Illuminate\Database\Seeder;
class CitiesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('cities'); } }
