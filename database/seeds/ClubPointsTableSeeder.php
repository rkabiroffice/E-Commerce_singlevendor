<?php
use Illuminate\Database\Seeder;
class ClubPointsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('club_points'); } }
