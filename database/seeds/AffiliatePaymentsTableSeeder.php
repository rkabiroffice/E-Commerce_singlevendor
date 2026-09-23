<?php
use Illuminate\Database\Seeder;
class AffiliatePaymentsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('affiliate_payments'); } }
