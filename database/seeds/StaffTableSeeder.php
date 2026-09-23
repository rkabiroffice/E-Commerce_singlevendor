<?php
use Illuminate\Database\Seeder;
class StaffTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('staff'); } }
