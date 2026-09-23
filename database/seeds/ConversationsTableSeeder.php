<?php
use Illuminate\Database\Seeder;
class ConversationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('conversations'); } }
