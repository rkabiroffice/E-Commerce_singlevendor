<?php
use Illuminate\Database\Seeder;
class NotificationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('notifications'); } }
