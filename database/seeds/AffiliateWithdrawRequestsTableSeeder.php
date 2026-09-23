<?php
use Illuminate\Database\Seeder;
class AffiliateWithdrawRequestsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('affiliate_withdraw_requests'); } }
