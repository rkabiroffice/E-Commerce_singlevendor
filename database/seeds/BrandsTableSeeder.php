<?php
use Illuminate\Database\Seeder;
class BrandsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('brands'); } }
