<?php
use Illuminate\Database\Seeder;
class ModelHasRolesGenericTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('model_has_roles'); } }
