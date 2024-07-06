<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $store = new Store();
        $store->nama_barang = 'Laptop 1';
        $store->gambar = '';
        $store->deskripsi = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo ipsa, excepturi libero commodi reprehenderit voluptatum ab soluta minus velit beatae vero veniam! Ducimus nulla laborum ratione, expedita consectetur suscipit possimus!';
        $store->harga = '1500000';
        $store->save();

        // Create seeder
        $store = new Store();
        $store->nama_barang = 'Laptop 2';
        $store->gambar = '';
        $store->deskripsi = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo ipsa, excepturi libero commodi reprehenderit voluptatum ab soluta minus velit beatae vero veniam! Ducimus nulla laborum ratione, expedita consectetur suscipit possimus!';
        $store->harga = '1800000';
        $store->save();

        // Create seeder
        $store = new Store();
        $store->nama_barang = 'Laptop 3';
        $store->gambar = '';
        $store->deskripsi = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo ipsa, excepturi libero commodi reprehenderit voluptatum ab soluta minus velit beatae vero veniam! Ducimus nulla laborum ratione, expedita consectetur suscipit possimus!';
        $store->harga = '2500000';
        $store->save();
    }
}
