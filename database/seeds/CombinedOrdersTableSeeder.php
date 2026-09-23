<?php
use Illuminate\Database\Seeder;
class CombinedOrdersTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('combined_orders'); } }
