<?php
use Illuminate\Database\Seeder;
class WishlistsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('wishlists'); } }
