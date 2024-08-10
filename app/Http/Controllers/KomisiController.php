<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Komisi;

class KomisiController extends Controller
{
    private function formatRupiah($angka, $prefix = 'Rp. ')
    {
        return $prefix . number_format($angka, 0, ',', '.');
    }

    public function index(request $request){
        $query = Komisi::latest()->paginate(10);
        $columnsSubset = ['nama_pemasukan','nominal','catatan','tanggal'];
        $title = 'Komisi';
        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
            ]);
        }
        $query->transform(function($item) {
            $item->nominal = $this->formatRupiah($item->nominal);
            return $item;
        });
        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
                'title' => $title
            ]);
        }
        return view('admin.pekerjaan', compact('query','columnsSubset','title'));
    }

    public function store(request $request){
        $columnsSubset = ['nama_pemasukan','nominal','catatan','tanggal'];
        $validator = Validator::make($request->all(), [
            'nama_pemasukan' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'catatan' => 'required|string|max:1000',
            'tanggal' => 'required|date_format:Y-m-d',
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }
        Komisi::create($request->all());
        $query = Komisi::latest()->paginate(10);
        $query->transform(function($item) {
            $item->nominal = $this->formatRupiah($item->nominal);
            return $item;
        });
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function show(Komisi $komisi)
    {
        $columnsSubset = ['nama_pemasukan','nominal','catatan','tanggal'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $komisi  
        ]); 
    }

    public function update(Request $request, Komisi $komisi)
    {
        $columnsSubset = ['nama_pemasukan','nominal','catatan','tanggal'];

        $validator = Validator::make($request->all(), [
            'nama_pemasukan' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'catatan' => 'required|string|max:1000',
            'tanggal' => 'required|date_format:Y-m-d',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        $komisi->update($request->all());
        $query = Komisi::latest()->paginate(10);
        $query->transform(function($item) {
            $item->nominal = $this->formatRupiah($item->nominal);
            return $item;
        });

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function destroy($id)
    {
        //delete post by ID
        Komisi::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}
