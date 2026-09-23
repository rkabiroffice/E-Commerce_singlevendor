<?php
use Illuminate\Database\Seeder;
class MessagesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('messages'); } }
