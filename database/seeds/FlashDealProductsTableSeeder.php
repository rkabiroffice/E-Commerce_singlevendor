<?php
use Illuminate\Database\Seeder;
class FlashDealProductsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('flash_deal_products'); } }
