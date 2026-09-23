<?php
use Illuminate\Database\Seeder;
class ProxypayPaymentsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('proxypay_payments'); } }
