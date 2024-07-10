<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    private function formatRupiah($angka, $prefix = 'Rp. ')
    {
        return $prefix . number_format($angka, 0, ',', '.');
    }

    //
    public function index(request $request){
        $query = Pengeluaran::latest()->paginate(10);
        $columnsSubset = ['nama_pengeluaran','nominal','catatan','tanggal'];
        $title = 'Pengeluaran';
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
        return view('admin.pengeluaran', compact('query','columnsSubset','title'));
    }

    public function store(request $request){
        $columnsSubset = ['nama_pengeluaran','nominal','catatan','tanggal'];
        $validator = Validator::make($request->all(), [
            'nama_pengeluaran' => 'required|string|max:255',
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
        $pengeluaran = Pengeluaran::create($request->all());
        $query = Pengeluaran::latest()->get();
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

    public function show(Pengeluaran $pengeluaran)
    {
        $columnsSubset = ['nama_pengeluaran','nominal','catatan','tanggal'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $pengeluaran  
        ]); 
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $columnsSubset = ['nama_pengeluaran','nominal','catatan','tanggal'];

        $validator = Validator::make($request->all(), [
            'nama_pengeluaran' => 'required|string|max:255',
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

        $pengeluaran->update($request->all());
        $query = Pengeluaran::latest()->get();
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
        Pengeluaran::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}
