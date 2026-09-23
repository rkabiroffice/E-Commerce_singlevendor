<?php
use Illuminate\Database\Seeder;
class WalletsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('wallets'); } }
