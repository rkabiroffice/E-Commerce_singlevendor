<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{
    public function run() { app(RelationshipAwareTableSeeder::class)->seed('role_has_permissions'); }
}
