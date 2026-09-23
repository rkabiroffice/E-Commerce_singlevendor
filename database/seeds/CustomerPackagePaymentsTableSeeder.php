<?php
use Illuminate\Database\Seeder;
class CustomerPackagePaymentsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('customer_package_payments'); } }
