<?php
use Illuminate\Database\Seeder;
class AttributeCategoryTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('attribute_category'); } }
