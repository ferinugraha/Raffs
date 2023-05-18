<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profil = [
            'data_id'       => '1',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ];

        Profile::insert($profil);
    }
}
