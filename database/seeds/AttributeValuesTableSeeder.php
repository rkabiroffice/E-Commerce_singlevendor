<?php
use Illuminate\Database\Seeder;
class AttributeValuesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('attribute_values'); } }
