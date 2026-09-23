<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run() { app(RelationshipAwareTableSeeder::class)->seed('roles'); }
}
