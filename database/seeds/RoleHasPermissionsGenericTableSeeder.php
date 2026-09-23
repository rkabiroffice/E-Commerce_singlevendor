<?php
use Illuminate\Database\Seeder;
class RoleHasPermissionsGenericTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('role_has_permissions'); } }
