<?php
use Illuminate\Database\Seeder;
class SubscribersTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('subscribers'); } }
