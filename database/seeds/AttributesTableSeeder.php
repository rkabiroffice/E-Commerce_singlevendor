<?php
use Illuminate\Database\Seeder;
class AttributesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('attributes'); } }
