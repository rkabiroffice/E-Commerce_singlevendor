<?php
use Illuminate\Database\Seeder;
class CartsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('carts'); } }
