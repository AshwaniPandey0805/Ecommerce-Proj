<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegsiterUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => "Rajat",
            "last_name" => "Sir",
            'email' => 'rajatSir007@codeBrew.org',
            'password' => Hash::make('@RajatSir007'),
            'phone_number' => '1234567892',
            'role' => 101,
            'user_image_path' => 'product/userImage/default_image.png'

        ]);
    }
}
