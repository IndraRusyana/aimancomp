<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MinumanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        //get all minumans from Models
        $query = Drink::latest()->get();
        // $columns = \Schema::getColumnListing('minumans');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'price'];

        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
            ]);
        }

        //return view with data
        return view('admin.layanan', compact('query','columnsSubset'));
    }

    public function store(Request $request)
    {
        // $columns = \Schema::getColumnListing('minumans');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'price'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create Minuman
        $minumans = Drink::create([
            'name'     => $request->name, 
            'price'   => $request->price,
        ]);

        $query = Drink::latest()->get();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function show(Drink $minuman)
    {
        $columnsSubset = ['name', 'price'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $minuman  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Drink $minuman)
    {
        $columnsSubset = ['name', 'price'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $minuman->update([
            'name'     => $request->name, 
            'price'   => $request->price,
        ]);

        $query = Drink::latest()->get();

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
        Drink::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}