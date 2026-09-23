<?php
use Illuminate\Database\Seeder;
class AffiliateStatsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('affiliate_stats'); } }
