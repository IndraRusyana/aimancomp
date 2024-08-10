<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengeluaran;

class PengeluaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = new Pengeluaran();
        $data->nama_pengeluaran = "bayar kontrakan";
        $data->nominal = 500000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-16";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "bayar wifi";
        $data->nominal = 287450;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-22";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "bayar kontrakan";
        $data->nominal = 800000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-16";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "bayar wifi";
        $data->nominal = 288000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-28";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli buku materi service laptop";
        $data->nominal = 72250;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-24";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "gaji miftah";
        $data->nominal = 750000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-10";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "gaji Ade jaga toko";
        $data->nominal = 25000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-22";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "ganti lcd tidak jalan oleh mif";
        $data->nominal = 115000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-20";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli HDD Caddy 9.5mm";
        $data->nominal = 72000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-18";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "komisi ade";
        $data->nominal = 10000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-22";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "makan mif";
        $data->nominal = 10000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-27";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "makan mif";
        $data->nominal = 10000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-28";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "makan mif";
        $data->nominal = 10000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-05";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "makan mif";
        $data->nominal = 10000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-07";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "makan ade dan abil";
        $data->nominal = 19000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-27";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli chatgpt pro";
        $data->nominal = 50000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-21";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli apk flash";
        $data->nominal = 48500;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-22";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli axioo buat kanibalan";
        $data->nominal = 330000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-27";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "stampel dan struk pembelian";
        $data->nominal = 115000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-02";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli batrai";
        $data->nominal = 301000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-06";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "jasa ade";
        $data->nominal = 40000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-20";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "jasa catat investor";
        $data->nominal = 20000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-20";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "sodaqoh buat mamah (tidak masuk investasi)";
        $data->nominal = 50000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-22";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "Rugi upal";
        $data->nominal = 150000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-25";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "membetulkan dudukan flexibel";
        $data->nominal = 50000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-05";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "pengecekan 3 laptop";
        $data->nominal = 60000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-08";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "sodaqoh perusahaan";
        $data->nominal = 80000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-14";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli SSD nvme 256gb";
        $data->nominal = 714500;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-01";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli SSD nvme 128gb";
        $data->nominal = 769300;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-01";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "struk service";
        $data->nominal = 20000;
        $data->catatan =  "-";
        $data->tanggal = "2024-05-28";
        $data->save();

        // data bulan 7
        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli salisiban";
        $data->nominal = 36000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-11";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "SPAREPART YANG DIBELI ISAL";
        $data->nominal = 132000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-14";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli ram 8gb 2 keping di Shopee";
        $data->nominal = 382160;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-20";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli pelindung keyboard di Shopee";
        $data->nominal = 16950;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-09";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli Canva Pro nabil";
        $data->nominal = 20999;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-08";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli stock mouse kabel dan bluetooth di Shopee";
        $data->nominal = 250080;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-10";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli converter dan juga casing hdd external";
        $data->nominal = 0;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-10";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli flashdisk kartu 16gb";
        $data->nominal = 98235;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-10";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli tissue";
        $data->nominal = 10000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-27";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli RAM 4GB DDR3";
        $data->nominal = 173620;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-27";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "beli RAM 4GB DDR3L 3 keping dan RAM 4GB DDR4 1 keping";
        $data->nominal = 249820;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-27";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "bayar repair touchpad abang doel";
        $data->nominal = 35000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-11";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "GALON AIR";
        $data->nominal = 6000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-14";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "KONTRAKKAN";
        $data->nominal = 800000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-16";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "stand holder laptop di Shopee";
        $data->nominal = 43888;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-10";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "WIFI";
        $data->nominal = 288000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-25";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "listrik";
        $data->nominal = 50000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "upah faisal";
        $data->nominal = 150000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "gaji abil";
        $data->nominal = 25000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-01";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "gaji abil";
        $data->nominal = 25000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-02";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "gaji abil";
        $data->nominal = 25000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-03";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "gaji ade";
        $data->nominal = 180000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-11";
        $data->save();

        $data = new Pengeluaran();
        $data->nama_pengeluaran = "pembuatan aplikasi internal Aiman Comp";
        $data->nominal = 500000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-02";
        $data->save();
    }
}
