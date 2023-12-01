<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Nyobi ah',
            'logo' => 'nyobi_png.png',
            'description' => 'Hallo Sobat Nyobiku dimanapun kalian berada..
            Nyobi menjual berbagai jenis cemilan kekinian yang pastinya enak bikin kalian ketagihan. Selain itu cemilan ini juga tanpa pengawet dan higienis lho! 😁

            oh iya toko kami juga sudah menyediakan gratis ongkir untuk pembelian tertentu ya, jadi jangan khawatir lagi 😁
            
            Chat di balas setiap hari 😁',
            'address' => 'lorem ipsum',
            'email' => 'nyobi@gmail.com',
            'phone' => '0812121212112',
            'name_rek' => 'Nyobi_ah',
            'no_rek' => '12512512712'
        ]);
    }
}
