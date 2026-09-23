<?php
use Illuminate\Database\Seeder;
class PaykuPaymentsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('payku_payments'); } }
