<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RelationshipAwareTableSeeder extends Seeder
{
    public function seed(string $table): void
    {
        if (!Schema::hasTable($table)) {
            return;
        }

        $dataPath = database_path('seed-data/'.$table.'.php');
        if (!is_file($dataPath)) {
            return;
        }

        $rows = require $dataPath;
        $rows = array_map(function (array $row) use ($table) {
            if ($table === 'permissions' && (
                ($row['section'] ?? '') === 'seller' ||
                ($row['section'] ?? '') === 'seller_subscription' ||
                str_contains($row['name'] ?? '', 'seller') ||
                str_contains($row['name'] ?? '', 'vendor')
            )) {
                return null;
            }

            if ($table === 'products') {
                $row['added_by'] = 'admin';
                $row['user_id'] = DB::table('users')->where('user_type', 'admin')->value('id');
                unset($row['seller_featured']);
            }

            if ($table === 'orders') {
                unset($row['seller_id'], $row['commission_calculated']);
            }

            if (in_array($table, ['order_details', 'payments', 'product_queries'], true)) {
                unset($row['seller_id']);
            }

            return $row;
        }, $rows);
        $rows = array_values(array_filter($rows));

        foreach (array_chunk($rows, 500) as $chunk) {
            DB::table($table)->insertOrIgnore($chunk);
        }
    }
}
