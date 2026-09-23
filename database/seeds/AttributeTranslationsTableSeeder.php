<?php
use Illuminate\Database\Seeder;
class AttributeTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('attribute_translations'); } }
