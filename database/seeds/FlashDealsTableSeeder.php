<?php
use Illuminate\Database\Seeder;
class FlashDealsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('flash_deals'); } }
