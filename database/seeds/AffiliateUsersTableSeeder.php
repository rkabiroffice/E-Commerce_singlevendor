<?php
use Illuminate\Database\Seeder;
class AffiliateUsersTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('affiliate_users'); } }
