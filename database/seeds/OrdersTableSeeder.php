<?php
use Illuminate\Database\Seeder;
class OrdersTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('orders'); } }
