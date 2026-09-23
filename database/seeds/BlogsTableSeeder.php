<?php
use Illuminate\Database\Seeder;
class BlogsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('blogs'); } }
