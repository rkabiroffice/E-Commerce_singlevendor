<?php
use Illuminate\Database\Seeder;
class PaymentsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('payments'); } }
