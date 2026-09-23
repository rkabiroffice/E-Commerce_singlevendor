<?php
use Illuminate\Database\Seeder;
class FlashDealTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('flash_deal_translations'); } }
