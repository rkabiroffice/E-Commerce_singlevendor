<?php
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
	public function run() { app(RelationshipAwareTableSeeder::class)->seed('categories'); }
}
