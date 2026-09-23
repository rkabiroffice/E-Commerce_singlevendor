<?php
use Illuminate\Database\Seeder;
class AffiliateLogsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('affiliate_logs'); } }
