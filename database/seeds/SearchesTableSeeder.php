<?php
use Illuminate\Database\Seeder;
class SearchesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('searches'); } }
