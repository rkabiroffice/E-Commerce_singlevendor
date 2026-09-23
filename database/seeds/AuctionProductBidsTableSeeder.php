<?php
use Illuminate\Database\Seeder;
class AuctionProductBidsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('auction_product_bids'); } }
