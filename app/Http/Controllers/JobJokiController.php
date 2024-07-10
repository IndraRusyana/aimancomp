<?php

namespace App\Http\Controllers;

use App\Models\JobJoki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JobJokiController extends Controller
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
        //get all jobjokis from Models
        $query = JobJoki::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga = $this->formatRupiah($item->harga);
            return $item;
        });
        // $columns = \Schema::getColumnListing('jobjokis');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['nama_tugas', 'client', 'deskripsi', 'estimasi_pengerjaan', 'status', 'harga', 'tanggal'];
        $title = 'Joki';
        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
                'title' => $title
            ]);
        }

        //return view with data
        return view('admin.pekerjaan', compact('query','columnsSubset','title'));
    }

    public function store(Request $request)
    {
        // $columns = \Schema::getColumnListing('jobjokis');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['nama_tugas', 'client', 'deskripsi', 'estimasi_pengerjaan', 'status', 'harga', 'tanggal'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_tugas' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:1000',
            'estimasi_pengerjaan' => 'required|string',
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
            'status' => [
                'required',
                'string',
                Rule::in(['pending', 'proses', 'selesai']), // Example statuses
            ],
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
        $jobjokis = JobJoki::create($request->all());

        $query = JobJoki::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga = $this->formatRupiah($item->harga);
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

    public function show(JobJoki $jobjoki)
    {
        $columnsSubset = ['nama_tugas', 'client', 'deskripsi', 'estimasi_pengerjaan', 'status', 'harga', 'tanggal'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $jobjoki  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, JobJoki $jobjoki)
    {
        $columnsSubset = ['nama_tugas', 'client', 'deskripsi', 'estimasi_pengerjaan', 'status', 'harga', 'tanggal'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_tugas' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:1000',
            'estimasi_pengerjaan' => 'required|string',
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
            'status' => [
                'required',
                'string',
                Rule::in(['pending', 'proses', 'selesai']), // Example statuses
            ],
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $jobjoki->update($request->all());

        $query = JobJoki::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga = $this->formatRupiah($item->harga);
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
        JobJoki::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}