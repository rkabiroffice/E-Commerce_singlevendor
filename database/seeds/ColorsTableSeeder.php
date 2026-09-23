<?php
use Illuminate\Database\Seeder;
class ColorsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('colors'); } }
