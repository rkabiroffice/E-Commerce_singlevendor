<?php
use Illuminate\Database\Seeder;
class PagesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('pages'); } }
