<?php

namespace App\Http\Controllers;

use App\Models\JobDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JobMinumanController extends Controller
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
        //get all jobdrinks from Models
        $query = JobDrink::latest()->paginate(10);
        // Format harga menjadi rupiah
        $query->transform(function($item) {
            $item->harga_jual = $this->formatRupiah($item->harga_jual);
            $item->modal = $this->formatRupiah($item->modal);
            return $item;
        });
        // $columns = \Schema::getColumnListing('jobdrinks');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['nama', 'modal', 'harga_jual', 'tanggal'];
        $title = 'Minuman';
        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
                'title' => $title,
            ]);
        }

        //return view with data
        return view('admin.pekerjaan', compact('query','columnsSubset','title'));
    }

    public function store(Request $request)
    {
        // $columns = \Schema::getColumnListing('jobdrinks');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['nama', 'modal', 'harga_jual', 'tanggal'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'modal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
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
        $jobdrinks = JobDrink::create($request->all());

        $query = JobDrink::latest()->paginate(10);
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

    public function show($id)
    {
        $columnsSubset = ['nama', 'modal', 'harga_jual', 'tanggal'];
        $jobdrink = JobDrink::find($id);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $jobdrink
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, $id)
    {
        $columnsSubset = ['nama', 'modal', 'harga_jual', 'tanggal'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'modal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        $jobdrink = JobDrink::find($id);
        //create post
        $jobdrink->update($request->all());

        $query = JobDrink::latest()->paginate(10);
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
        JobDrink::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}