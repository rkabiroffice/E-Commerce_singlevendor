<?php
use Illuminate\Database\Seeder;
class ManualPaymentMethodsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('manual_payment_methods'); } }
