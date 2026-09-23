<?php
use Illuminate\Database\Seeder;
class AddressesTableSeeder extends Seeder { public function run() { app(RelationshipAwareTableSeeder::class)->seed('addresses'); } }
