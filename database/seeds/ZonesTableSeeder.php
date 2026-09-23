<?php
use Illuminate\Database\Seeder;
class ZonesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('zones'); } }
