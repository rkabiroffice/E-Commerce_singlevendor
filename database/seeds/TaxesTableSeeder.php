<?php
use Illuminate\Database\Seeder;
class TaxesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('taxes'); } }
