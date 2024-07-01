<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InvestorController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        //get all investors from Models
        $query = Investor::latest()->get();
        // $columns = \Schema::getColumnListing('investors');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'jml_investasi', 'prsnt_investasi', 'doc_mou'];

        if ($request->ajax()) {
            return response()->json([
                'query' => $query,
                'columnsSubset' => $columnsSubset,
            ]);
        }

        //return view with data
        return view('admin.keanggotaan', compact('query','columnsSubset'));
    }

    public function store(Request $request)
    {
        // $columns = \Schema::getColumnListing('investors');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'jml_investasi', 'prsnt_investasi', 'doc_mou'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nik' => 'required|unique:users',
            // 'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'foto_ktp' => 'required|string',
            'no_hp' => 'required|numeric', // Assuming a phone number
            'jml_investasi' => 'required|numeric',
            'prsnt_investasi' => 'required|numeric',
            // 'doc_mou' => 'required|file|mimes:pdf,doc,docx|max:5120', // Assuming a document file
            'doc_mou' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create Investor
        $investor = Investor::create($request->all());
        $query = Investor::latest()->get();
        
        $request->merge([
            'password' => bcrypt('password')
        ]);

        $request->merge([
            'role' => 'investor',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'query' => $query,
            'columnsSubset' => $columnsSubset, 
        ]);
    }

    public function show(Investor $investor)
    {
        $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'jml_investasi', 'prsnt_investasi', 'doc_mou'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $investor  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Investor $investor, User $user)
    {
        $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'jml_investasi', 'prsnt_investasi', 'doc_mou'];
        // Dapatkan user terkait Investor
        $user = User::where('email', $request->email)->where('nik', $request->nik)->first();
        // dd($user->id);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
            'nik' => ['required',Rule::unique('users')->ignore($user->id)],
            // 'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'foto_ktp' => 'required|string',
            'no_hp' => 'required|numeric', // Assuming a phone number
            'jml_investasi' => 'required|numeric',
            'prsnt_investasi' => 'required|numeric',
            // 'doc_mou' => 'required|file|mimes:pdf,doc,docx|max:5120', // Assuming a document file
            'doc_mou' => 'required|string',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        $email = $request->email;
        $nik = $request->nik;
        
        // Cari user berdasarkan email dan nik
        $user->where('email', $email)->where('nik', $nik)->firstOrFail();
        //update table Investor
        $investor->update([
            'name'     => $request->name, 
            'email'   => $request->email,
            'nik' => $request->nik,
            'foto_ktp' => $request->foto_ktp,
            'no_hp' => $request->no_hp,
            'jml_investasi' => $request->jml_investasi,
            'prsnt_investasi' => $request->prsnt_investasi,
            'doc_mou' => $request->doc_mou,
        ]);
        $user->update($request->only('name', 'email' ,'nik'));
        $query = Investor::latest()->get();

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
        $investor = Investor::find($id);
        // dump($id);
        // dump($investor->id);
        $user = User::where('email', $investor->email)->where('nik', $investor->nik)->first();
        // dd($user->id);
        //delete post by ID
        Investor::where('id', $investor->id)->delete();
        User::where('id', $user->id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}