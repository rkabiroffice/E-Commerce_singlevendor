<?php
use Illuminate\Database\Seeder;
class TicketsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('tickets'); } }
