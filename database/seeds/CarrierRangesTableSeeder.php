<?php
use Illuminate\Database\Seeder;
class CarrierRangesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('carrier_ranges'); } }
