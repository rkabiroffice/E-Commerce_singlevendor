<?php
use Illuminate\Database\Seeder;
class PickupPointTranslationsTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('pickup_point_translations'); } }
