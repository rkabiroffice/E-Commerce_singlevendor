<?php
use Illuminate\Database\Seeder;
class FirebaseNotificationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('firebase_notifications'); } }
