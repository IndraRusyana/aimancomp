<?php

namespace App\Http\Controllers;

use App\Models\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JobServiceController extends Controller
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
        //get all jobservices from Models
        $query = JobService::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga = $this->formatRupiah($item->harga);
            return $item;
        });
        // $columns = \Schema::getColumnListing('jobservices');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['merk', 'gambar', 'kondisi_masuk', 'keluhan', 'solusi', 'status', 'harga', 'tanggal'];
        $title = 'Service';
        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
                'title' => $title,
            ]);
        }
        $active = 'active';

        //return view with data
        return view('admin.pekerjaan', compact('query','columnsSubset','title','active'));
    }

    public function store(Request $request)
    {
        // $columns = \Schema::getColumnListing('jobservices');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['merk', 'gambar', 'kondisi_masuk', 'keluhan', 'solusi', 'status', 'harga', 'tanggal'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'merk' => 'required|string|max:255',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'gambar' => 'required|string',
            'kondisi_masuk' => 'required|string|max:1000',
            'keluhan' => 'required|string|max:1000',
            'solusi' => 'required|string|max:1000',
            'status' => [
                'required',
                'string',
                Rule::in(['pending', 'proses', 'selesai']), // Example statuses
            ],
            'harga' => 'required|numeric|min:0',
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
        $jobservices = JobService::create($request->all());

        $query = JobService::latest()->paginate(10);;
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

    public function show(JobService $jobservice)
    {
        $columnsSubset = ['merk', 'gambar', 'kondisi_masuk', 'keluhan', 'solusi', 'status', 'harga', 'tanggal'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $jobservice  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, JobService $jobservice)
    {
        $columnsSubset = ['merk', 'gambar', 'kondisi_masuk', 'keluhan', 'solusi', 'status', 'harga', 'tanggal'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'merk' => 'required|string|max:255',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'gambar' => 'required|string',
            'kondisi_masuk' => 'required|string|max:1000',
            'keluhan' => 'required|string|max:1000',
            'solusi' => 'required|string|max:1000',
            'status' => [
                'required',
                'string',
                Rule::in(['pending', 'proses', 'selesai']), // Example statuses
            ],
            'harga' => 'required|numeric|min:0',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $jobservice->update($request->all());

        $query = JobService::latest()->paginate(10);;
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
        JobService::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}