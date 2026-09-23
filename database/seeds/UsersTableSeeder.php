<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run() { app(RelationshipAwareTableSeeder::class)->seed('users'); }
}
