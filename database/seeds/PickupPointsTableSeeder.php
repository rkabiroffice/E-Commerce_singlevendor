<?php
use Illuminate\Database\Seeder;
class PickupPointsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('pickup_points'); } }
