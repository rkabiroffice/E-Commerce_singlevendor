<?php

use Illuminate\Database\Seeder;

class AddonsTableSeeder extends Seeder
{
    public function run() { app(RelationshipAwareTableSeeder::class)->seed('addons'); }
}
