<?php
use Illuminate\Database\Seeder;
class HomeCategoriesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('home_categories'); } }
