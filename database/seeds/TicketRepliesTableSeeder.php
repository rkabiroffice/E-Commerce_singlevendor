<?php
use Illuminate\Database\Seeder;
class TicketRepliesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('ticket_replies'); } }
