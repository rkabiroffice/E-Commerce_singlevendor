<?php
use Illuminate\Database\Seeder;
class CarriersTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('carriers'); } }
