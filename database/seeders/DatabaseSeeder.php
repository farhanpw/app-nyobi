<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Variant;
use App\Models\Size;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(AboutSeeder::class);

        //Role user
        Role::create([
            'role_name' => 'Admin'
        ]);
        
        Role::create([
            'role_name' => 'Member'
        ]);

        //Varian rasa
        Variant::create([
            'name' => 'Extra Pedas'
        ]);

        Variant::create([
            'name' => 'Pedas'
        ]);

        Variant::create([
            'name' => 'Original'
        ]);

        //Ukuran berat
        Size::create([
            'name' => '125 Gram'
        ]);
        
        Size::create([
            'name' => '250 Gram'
        ]);

        Size::create([
            'name' => '500 Gram'
        ]);
        
        Size::create([
            'name' => '1000 Gram'
        ]);

        //Product basreng
        Product::create([
            'size_id' => '1',
            'variant_id' => '1',
            'product_name' => 'Basreng',
            'image' => 'basrengxpedas.png',
            'description' => 'Basreng Khas Tasikmalaya adalah Bakso Goreng berbahan dasar ikan. Cemilan kekinian dengan rempah-rempah pilihan serta menggunakan cabe asli ',
            'price' => '12000',
            'material' => 'Bakso, Cabai, Garam',
            'stock' => '5',

        ]);
        
        Product::create([
            'size_id' => '1',
            'variant_id' => '3',
            'product_name' => 'Basreng',
            'image' => 'basrengori.png',
            'description' => 'Basreng Khas Tasikmalaya adalah Bakso Goreng berbahan dasar ikan. Cemilan kekinian dengan rempah-rempah pilihan serta menggunakan cabe asli ',
            'price' => '12000',
            'material' => 'Bakso, Cabai, Garam',
            'stock' => '5',

        ]);
        
        Product::create([
            'size_id' => '1',
            'variant_id' => '2',
            'product_name' => 'Basreng',
            'image' => 'basrengpedas.png',
            'description' => 'Basreng Khas Tasikmalaya adalah Bakso Goreng berbahan dasar ikan. Cemilan kekinian dengan rempah-rempah pilihan serta menggunakan cabe asli ',
            'price' => '12000',
            'material' => 'Bakso, Cabai, Garam',
            'stock' => '5',

        ]);
        
        //Product makaroni
        Product::create([
            'size_id' => '1',
            'variant_id' => '2',
            'product_name' => 'Makaroni',
            'image' => 'makapedas.png',
            'description' => 'Basreng Khas Tasikmalaya adalah Makaroni Goreng berbahan dasar ikan. Cemilan kekinian dengan rempah-rempah pilihan serta menggunakan cabe asli ',
            'price' => '10000',
            'material' => 'Makaroni, Cabai, Garam',
            'stock' => '5',

        ]);
        
        Product::create([
            'size_id' => '1',
            'variant_id' => '3',
            'product_name' => 'Makaroni',
            'image' => 'makaori.png',
            'description' => 'Basreng Khas Tasikmalaya adalah Makaroni Goreng berbahan dasar ikan. Cemilan kekinian dengan rempah-rempah pilihan serta menggunakan cabe asli ',
            'price' => '10000',
            'material' => 'Makaroni, Cabai, Garam',
            'stock' => '5',

        ]);
        
        //Product tempe
        Product::create([
            'size_id' => '1',
            'variant_id' => '2',
            'product_name' => 'Keripik Tempe',
            'image' => 'tempepedas.png',
            'description' => 'Basreng Khas Tasikmalaya adalah Tempe Goreng berbahan dasar ikan. Cemilan kekinian dengan rempah-rempah pilihan serta menggunakan cabe asli ',
            'price' => '15000',
            'material' => 'Tempe, Cabai, Garam',
            'stock' => '5',

        ]);
        
        Product::create([
            'size_id' => '1',
            'variant_id' => '3',
            'product_name' => 'Keripik Tempe',
            'image' => 'tempeori.png',
            'description' => 'Basreng Khas Tasikmalaya adalah Tempe Goreng berbahan dasar ikan. Cemilan kekinian dengan rempah-rempah pilihan serta menggunakan cabe asli ',
            'price' => '15000',
            'material' => 'Tempe, Cabai, Garam',
            'stock' => '5',

        ]);

        //Slider
        Slider::create([
            'name_slider' => 'Slider1',
            'description' => 'Hello Sobat nyobi',
            'image' => 'Slider1.jpg',
        ]);

        Slider::create([
            'name_slider' => 'Slider1',
            'description' => 'Hello Sobat nyobi',
            'image' => 'Slider2.jpg',
        ]);

        Slider::create([
            'name_slider' => 'Slider1',
            'description' => 'Hello Sobat nyobi',
            'image' => 'Slider1',
        ]);




        User::factory(5)->create();
    }
}
