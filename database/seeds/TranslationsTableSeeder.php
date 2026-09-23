<?php
use Illuminate\Database\Seeder;
class TranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('translations'); } }
