<?php
use Illuminate\Database\Seeder;
class UploadsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('uploads'); } }
