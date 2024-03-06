<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('roles')->insert([
                [
                    'role_id' => 101,
                    'role_name' => 'Admin'
                    ],
                    [
                    'role_id' => 102,
                    'role_name' => 'Sub Admin'
                    ],
                    [
                    'role_id' => 103,
                    'role_name' => 'Vendor'
                    ],
                    [
                    'role_id' => 104,
                    'role_name' => 'User'
                    ]
                    ]);
    }
}
