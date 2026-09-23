<?php
use Illuminate\Database\Seeder;
class SmsTemplatesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('sms_templates'); } }
