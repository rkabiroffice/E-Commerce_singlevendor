<?php
use Illuminate\Database\Seeder;
class ClubPointDetailsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('club_point_details'); } }
