<?php
use Illuminate\Database\Seeder;
class ModelHasPermissionsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('model_has_permissions'); } }
