<?php
use Illuminate\Database\Seeder;
class PasswordResetsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('password_resets'); } }
