<?php
use Illuminate\Database\Seeder;
class BlogCategoriesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('blog_categories'); } }
