<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run() { app(RelationshipAwareTableSeeder::class)->seed('permissions'); }
}
