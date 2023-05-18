<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            [
                'product_name' => 'Mie Ayam',
                'price' => 25000,
                'image' => '1671966157.png',
                'description' => 'Mie Ayam adalah makanan Indonesia yang terdiri dari mi instan yang dicampur dengan kuah kaldu ayam dan ditambah dengan potongan daging ayam, sayuran seperti wortel, bok choy, dan daun bawang, serta bahan-bahan lainnya seperti bawang goreng, kecap manis, dan kerupuk. Rasa mi ayam ini khas dan gurih, dan sering disajikan dengan irisan telur puyuh dan sambal di atasnya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Nasi Goreng',
                'price' => 23000,
                'image' => '1671966167.png',
                'description' => 'Nasi Goreng adalah makanan Indonesia yang terdiri dari nasi yang digoreng bersama dengan berbagai bahan lain seperti daging, telur, dan sayuran. Rasa nasi goreng ini khas dan gurih, dan sering disajikan dengan irisan telur di atasnya. Biasanya, nasi goreng juga ditambahkan dengan bahan-bahan seperti kecap manis, bawang goreng, dan sambal untuk memberikan cita rasa yang lebih kompleks.' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Menu::insert($menu);
    }
}
