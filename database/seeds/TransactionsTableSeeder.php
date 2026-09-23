<?php
use Illuminate\Database\Seeder;
class TransactionsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('transactions'); } }
