<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SparepartController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all spareparts from Models
        $query = Sparepart::latest()->get();
        // $columns = \Schema::getColumnListing('spareparts');
        // $columnsSubset = [
        //     $columns[1], 
        //     $columns[2], 
        //     $columns[3],
        //     $columns[4],
        //     $columns[5],
        //     $columns[6],
        // ];
        $columnsSubset = ['name', 'price', 'description', 'image', 'stock', 'quality'];  

        return response()->json([
            'query' => $query,
            'columnsSubset' => $columnsSubset,
        ]);
    }

    public function store(Request $request)
    {
        //get all spareparts from Models
        // $columns = \Schema::getColumnListing('spareparts');
        // $columnsSubset = [
        //     $columns[1], 
        //     $columns[2], 
        //     $columns[3],
        //     $columns[4],
        //     $columns[5],
        //     $columns[6],
        // ];
        $columnsSubset = ['name', 'price', 'description', 'image', 'stock', 'quality']; 

        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'image' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk file gambar
            'stock' => 'required|integer|min:0', // validasi untuk stok harus berupa angka integer tidak boleh negatif
            'quality' => 'required|string|max:255', // validasi untuk kualitas produk
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $sparepart = Sparepart::create([
            'name'     => $request->name, 
            'price'   => $request->price,
            'description' => $request->description,
            'image' => $request->image,
            'stock' => $request->stock,
            'quality' => $request->quality,
        ]);

        $query = Sparepart::latest()->get();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function show(Sparepart $sparepart)
    {
        $columnsSubset = ['name', 'price', 'description', 'image', 'stock', 'quality'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Sparepart',
            'thead'   => $columnsSubset,
            'data'    => $sparepart  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $Sparepart
     * @return void
     */
    public function update(Request $request, Sparepart $sparepart)
    {
        $columnsSubset = ['name', 'price', 'description', 'image', 'stock', 'quality'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'image' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk file gambar
            'stock' => 'required|integer|min:0', // validasi untuk stok harus berupa angka integer tidak boleh negatif
            'quality' => 'required|string|max:255', // validasi untuk kualitas produk
        ]);

         //check if validation fails
         if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $sparepart->update([
            'name'     => $request->name, 
            'price'   => $request->price,
            'description' => $request->description,
            'image' => $request->image,
            'stock' => $request->stock,
            'quality' => $request->quality,
        ]);

        $query = Sparepart::latest()->get();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
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
        Sparepart::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}