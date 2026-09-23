<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{
    public function run() { app(RelationshipAwareTableSeeder::class)->seed('model_has_roles'); }
}
