<?php
use Illuminate\Database\Seeder;
class CustomerPackageTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('customer_package_translations'); } }
