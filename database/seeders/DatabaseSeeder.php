<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'first_name' => 'rifky',
            'last_name' => 'martha',
            'photo' => 'Music Girl.png',
            'email' => 'admin1@foodpad.dev',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::create([
            'first_name' => 'hadian',
            'last_name' => 'firmana',
            'email' => 'admin2@foodpad.dev',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::create([
            'first_name' => 'lorem',
            'last_name' => 'ipsum',
            'email' => 'admin3@foodpad.dev',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Recipe::create([
            'name' => 'Dimsum Ayam Jamur',
            'thumbnail' => 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/11/30/3740584419.jpeg',
            'description' => 'Resep Dimsum Ayam Jamur, Lezatnya Bikin Ngiler',
            'prepare' => 10,
            'duration' => 60,
            'level' => 'Mudah',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Category::create([
            'category' => "Ayam",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Category::create([
            'category' => "Sapi",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Category::create([
            'category' => "Nasi",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Category::create([
            'category' => "Ikan",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Category::create([
            'category' => "Tahu",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Category::create([
            'category' => "Tempe",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\CategoryRecipes::create([
            'recipe_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\CategoryRecipes::create([
            'recipe_id' => 1,
            'category_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Ingredients::create([
            'name' => "Bawang",
            'value' => "1kg",
            'recipe_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Ingredients::create([
            'name' => "Minyak goreng",
            'value' => "1 liter",
            'recipe_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Ingredients::create([
            'name' => "Merica",
            'value' => "4kg",
            'recipe_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Step::create([
            'step' => "Masukkan potongan ayam ke dalam food processor, proses hingga halus.",
            'recipe_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Step::create([
            'step' => "Tambahkan telur, tepung sagu, garam, dan merica bubuk, proses hingga rata dan adonan bertekstur lengket (3-5 menit).",
            'recipe_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\Step::create([
            'step' => "Masukkan jamur dan daun bawang, proses hingga tercampur rata.",
            'recipe_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Rating::create([
            'recipe_id' => 1,
            'user_id' => 2,
            'rating' => 4,
            'review' => "resepnya bagus",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Rating::create([
            'recipe_id' => 1,
            'user_id' => 3,
            'rating' => 1,
            'review' => "nggak enak",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Rating::create([
            'recipe_id' => 1,
            'user_id' => 3,
            'rating' => 5,
            'review' => "terus berkarnya kak",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
