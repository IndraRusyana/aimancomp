<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index(request $request)
    {
        $columnsSubset = ['nama_barang','gambar','deskripsi','harga'];
        $query = Store::latest()->get();

        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
            ]);
        }

        return view('admin.store', compact('query','columnsSubset'));
    }

    public function store(request $request){

        $columnsSubset = ['nama_barang','gambar','deskripsi','harga'];
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // validasi untuk file gambar
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|integer'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('columnsSubset', $columnsSubset);
        }

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
        }

        //create data
        $stores = Store::create([
            'nama_barang'     => $request->nama_barang, 
            'gambar' => $path ?? null, // Save the path of the image
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
        ]);

        $query = Store::latest()->get();

        return redirect()->back()->with('success', 'Data Berhasil Disimpan!')->with('columnsSubset', $columnsSubset);
    }

    public function show($id)
    {
        $query = Store::findOrFail($id);
        $columnsSubset = ['nama_barang', 'gambar', 'deskripsi', 'harga'];
    
        return view('components.sell-modal-edit', compact('query','columnsSubset'));
    }

    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // validasi gambar menjadi nullable
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|integer'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete the old image if it exists
            if ($store->gambar && Storage::exists('public/'.$store->gambar)) {
                Storage::delete('public/'.$store->gambar);
            }

            // Store the new image
            $filePath = $request->file('gambar')->store('uploads', 'public');
            $store->gambar = $filePath;
        } else {
            // Use existing image
            $store->gambar = $request->input('existing_gambar');
        }

        // Update other fields
        $store->nama_barang = $request->input('nama_barang');
        $store->deskripsi = $request->input('deskripsi');
        $store->harga = $request->input('harga');
        // Add other fields as necessary

        $store->save();

        return redirect()->route('store.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        //delete post by ID
        Store::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }

    public function showWebStore()
    {
        $query = Store::latest()->get();
        return view('/store', compact('query'));
    }
}