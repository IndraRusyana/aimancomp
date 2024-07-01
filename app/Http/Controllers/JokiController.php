<?php

namespace App\Http\Controllers;

use App\Models\Joki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JokiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        //get all jokis from Models
        $query = Joki::latest()->get();
        // $columns = \Schema::getColumnListing('jokis');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'price', 'description'];

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
        // $columns = \Schema::getColumnListing('jokis');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'price', 'description'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create service
        $jokis = Joki::create([
            'name'     => $request->name, 
            'price'   => $request->price,
            'description' => $request->description,
        ]);

        $query = Joki::latest()->get();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function show(Joki $joki)
    {
        $columnsSubset = ['name', 'price', 'description'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $joki  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Joki $joki)
    {
        $columnsSubset = ['name', 'price', 'description'];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create post
        $joki->update([
            'name'     => $request->name, 
            'price'   => $request->price,
            'description' => $request->description,
        ]);

        $query = Joki::latest()->get();

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
        Joki::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}