<?php
use Illuminate\Database\Seeder;
class RoleTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('role_translations'); } }
