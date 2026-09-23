<?php
use Illuminate\Database\Seeder;
class OtpConfigurationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('otp_configurations'); } }
