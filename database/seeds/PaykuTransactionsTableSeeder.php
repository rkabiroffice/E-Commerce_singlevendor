<?php
use Illuminate\Database\Seeder;
class PaykuTransactionsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('payku_transactions'); } }
