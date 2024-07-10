<?php

namespace App\Http\Controllers;

use App\Models\JobSparepart;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JobSparepartController extends Controller
{
    private function formatRupiah($angka, $prefix = 'Rp. ')
    {
        return $prefix . number_format($angka, 0, ',', '.');
    }
    
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        //get all jobspareparts from Models
        $query = JobSparepart::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga_awal = $this->formatRupiah($item->harga_awal);
            $item->harga_jual = $this->formatRupiah($item->harga_jual);
            return $item;
        });
        // $columns = \Schema::getColumnListing('jobspareparts');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['nama', 'gambar', 'kualitas', 'jumlah', 'harga_awal', 'harga_jual', 'tanggal' ];
        $title = 'Sparepart';
        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
                'title' => $title
            ]);
        }
        $active = 'active';

        //return view with data
        return view('admin.pekerjaan', compact('query','columnsSubset','title','active'));
    }

    public function store(Request $request)
    {
        // $columns = \Schema::getColumnListing('jobspareparts');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['nama', 'gambar', 'kualitas', 'jumlah', 'harga_awal', 'harga_jual', 'tanggal', ];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'gambar' => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'harga_awal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'kualitas' => 'required|string|max:1000',
            'jumlah' => 'required|numeric|min:0',
            'tanggal' => 'required|date_format:Y-m-d',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create service
        $jobspareparts = JobSparepart::create($request->all());

        $query = JobSparepart::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga_awal = $this->formatRupiah($item->harga_awal);
            $item->harga_jual = $this->formatRupiah($item->harga_jual);
            return $item;
        });

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function show(JobSparepart $jobsparepart)
    {
        $columnsSubset = ['nama', 'gambar', 'kualitas', 'jumlah', 'harga_awal', 'harga_jual' ,'tanggal'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $jobsparepart  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, JobSparepart $jobsparepart)
    {
        $columnsSubset = ['nama', 'gambar', 'kualitas', 'jumlah', 'harga_awal', 'harga_jual' ,'tanggal'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'gambar' => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'harga_awal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'kualitas' => 'required|string|max:1000',
            'jumlah' => 'required|numeric|min:0',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $jobsparepart->update($request->all());

        $query = JobSparepart::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga_awal = $this->formatRupiah($item->harga_awal);
            $item->harga_jual = $this->formatRupiah($item->harga_jual);
            return $item;
        });

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

        /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //delete post by ID
        JobSparepart::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}