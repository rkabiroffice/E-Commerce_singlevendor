<?php
use Illuminate\Database\Seeder;
class CustomerPackagesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('customer_packages'); } }
