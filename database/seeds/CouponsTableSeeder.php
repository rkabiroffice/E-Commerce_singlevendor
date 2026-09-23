<?php
use Illuminate\Database\Seeder;
class CouponsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('coupons'); } }
