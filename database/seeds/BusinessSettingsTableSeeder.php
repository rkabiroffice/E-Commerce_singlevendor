<?php
use Illuminate\Database\Seeder;
class BusinessSettingsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('business_settings'); } }
