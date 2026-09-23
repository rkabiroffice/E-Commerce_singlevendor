<?php
use Illuminate\Database\Seeder;
class AffiliateOptionsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('affiliate_options'); } }
