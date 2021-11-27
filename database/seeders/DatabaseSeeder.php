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
        \App\Models\User::factory(10)->create();

        \App\Models\Recipe::create([
            'name' => 'Resep Dimsum Ayam Jamur, Lezatnya Bikin Ngiler',
            'thumbnail' => 'https://img.kurio.network/XzZrPvTIY-iIuEQFwN73TMm1ePc=/440x440/filters:quality(80)/https://kurio-img.kurioapps.com/21/10/12/71a5f06f-0f6a-48cb-981b-c85bff9d38bd.jpe',
            'ingredients' => '1 butir telur
            3 sdm tepung sagu
            1 sdt garam
            ½ sdt merica bubuk',
            'step' => 'Masukkan potongan ayam ke dalam food processor, proses hingga halus.

            Tambahkan telur, tepung sagu, garam, dan merica bubuk, proses hingga rata dan adonan bertekstur lengket (3-5 menit).
            
            Masukkan jamur dan daun bawang, proses hingga tercampur rata.',
            'level' => 'Mudah',
            'duration' => 60,
            'category' => "Main Course",
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Rating::create([
            'recipe_id' => 1,
            'user_id' => 2,
            'rating' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Rating::create([
            'recipe_id' => 1,
            'user_id' => 3,
            'rating' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Rating::create([
            'recipe_id' => 1,
            'user_id' => 3,
            'rating' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\Comment::create([
            'comment' => 1,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
