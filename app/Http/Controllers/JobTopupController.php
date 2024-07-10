<?php

namespace App\Http\Controllers;

use App\Models\JobTopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JobTopupController extends Controller
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
        //get all jobtopups from Models
        $query = JobTopup::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga_jual = $this->formatRupiah($item->harga_jual);
            $item->modal = $this->formatRupiah($item->modal);
            return $item;
        });
        // $columns = \Schema::getColumnListing('jobtopups');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['provider', 'nomor_konsumen','modal', 'harga_jual', 'status', 'tanggal'];
        $title = 'Topup';
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
        // $columns = \Schema::getColumnListing('jobtopups');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['provider', 'nomor_konsumen','modal', 'harga_jual', 'status', 'tanggal'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'provider' => 'required|string|max:255',
            'modal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'nomor_konsumen' => 'required|string|max:15', // Assuming a phone number of exact 12 characters
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
        $jobtopups = JobTopup::create($request->all());

        $query = JobTopup::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga_jual = $this->formatRupiah($item->harga_jual);
            $item->modal = $this->formatRupiah($item->modal);
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

    public function show(JobTopup $jobtopup)
    {
        $columnsSubset = ['provider', 'nomor_konsumen','modal', 'harga_jual', 'status', 'tanggal'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $jobtopup  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, JobTopup $jobtopup)
    {
        $columnsSubset = ['provider', 'nomor_konsumen','modal', 'harga_jual', 'status', 'tanggal'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'provider' => 'required|string|max:255',
            'modal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'nomor_konsumen' => 'required|string|max:15', // Assuming a phone number of exact 12 characters
                        'status' => [
                'required',
                'string',
                Rule::in(['pending', 'proses', 'selesai']), // Example statuses
            ],
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $jobtopup->update($request->all());

        $query = JobTopup::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga_jual = $this->formatRupiah($item->harga_jual);
            $item->modal = $this->formatRupiah($item->modal);
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
        JobTopup::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}