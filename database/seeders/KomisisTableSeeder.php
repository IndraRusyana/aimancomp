<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Komisi;

class KomisisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = new Komisi();
        $data->nama_pemasukan = "komisi jual laptop tidak masuk invest";
        $data->nominal = 211000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-01";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "komisi laptop (yg tidak masuk invest)";
        $data->nominal = 270000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-06";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "komisi laptop";
        $data->nominal = 310000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-07";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "komisi laptop x441ua tidak masuk investasi";
        $data->nominal = 411000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-30";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "komisi lenovo thinkpad k2450";
        $data->nominal = 81000;
        $data->catatan =  "-";
        $data->tanggal = "2024-06-30";
        $data->save();

        // data bulan 7
        $data = new Komisi();
        $data->nama_pemasukan = "komisi";
        $data->nominal = 60000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "HP ELITEBOOK 840 G6";
        $data->nominal = 35000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD 130-14AST";
        $data->nominal = 105000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD 330";
        $data->nominal = 420000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "ASUS E402B";
        $data->nominal = 180000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD 330 (BELUM POST)";
        $data->nominal = 30000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "ACER ASPIRE 4732Z";
        $data->nominal = 60000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD SLIM 3 AMD3020e";
        $data->nominal = 55000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "HP 14 CM SDD NON BACKLIT";
        $data->nominal = 65000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "HP 14CM ke LENOVO IP 330";
        $data->nominal = 58000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "HP PAVILION X360 13 INCH";
        $data->nominal = 550000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "ACER SWIFT 3";
        $data->nominal = 102000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "ACER ASPIRE A514-54";
        $data->nominal = 150000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "ASUS X441B";
        $data->nominal = 150000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD 120s";
        $data->nominal = 354000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "AXIOO SLIMBOOK 13";
        $data->nominal = 57000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD 330";
        $data->nominal = 80000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "ACER SWIFT 3 DUAL VGA";
        $data->nominal = 70000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD 110";
        $data->nominal = 75000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "HP 14s CF DUAL VGA ";
        $data->nominal = 75000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO IDEAPAD 330, 8/128+500";
        $data->nominal = 60000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "ADVAN SOULMATE";
        $data->nominal = 70000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-25";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "LENOVO YOGA 310";
        $data->nominal = 80000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "AXIOO MYBOOK PRO";
        $data->nominal = 40000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "HP 14s DK";
        $data->nominal = 120000;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();

        $data = new Komisi();
        $data->nama_pemasukan = "THINKPAD T450";
        $data->nominal = 1012500;
        $data->catatan =  "-";
        $data->tanggal = "2024-07-21";
        $data->save();


    }
}
