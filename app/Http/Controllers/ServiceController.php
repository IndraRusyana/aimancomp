<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        //get all services from Models
        $query = Service::latest()->get();
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
        // $columns = \Schema::getColumnListing('services');
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
        $services = Service::create([
            'name'     => $request->name, 
            'price'   => $request->price,
            'description' => $request->description,
        ]);

        $query = Service::latest()->get();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function show(Service $service)
    {
        $columnsSubset = ['name', 'price', 'description'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $service  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Service $service)
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
        $service->update([
            'name'     => $request->name, 
            'price'   => $request->price,
            'description' => $request->description,
        ]);

        $query = Service::latest()->get();

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
        Service::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}