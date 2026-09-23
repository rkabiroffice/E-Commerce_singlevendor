<?php
use Illuminate\Database\Seeder;
class OrderDetailsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('order_details'); } }
