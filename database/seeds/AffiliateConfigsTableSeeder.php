<?php
use Illuminate\Database\Seeder;
class AffiliateConfigsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('affiliate_configs'); } }
