<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        //get all owners from Models
        $query = Owner::latest()->get();
        // $columns = \Schema::getColumnListing('owners');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'email', 'nik'];

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
        // $columns = \Schema::getColumnListing('owners');
        // $columnsSubset = [$columns[1], $columns[2], $columns[3]];
        $columnsSubset = ['name', 'email', 'nik'];

        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nik' => 'required|unique:users',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'columnsSubset' => $columnsSubset
            ], 422);
        }

        //create Admin
        $owner = Owner::create($request->all());
        $query = Owner::latest()->get();
        
        $request->merge([
            'password' => bcrypt('password')
        ]);

        $request->merge([
            'role' => 'owner',
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

    public function show(Owner $owner)
    {
        $columnsSubset = ['name', 'email', 'nik'];
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'thead'   => $columnsSubset,
            'data'    => $owner  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Owner $owner, User $user)
    {
        $columnsSubset = ['name', 'email', 'nik'];
        // Dapatkan user terkait Owner
        $user = User::where('email', $request->email)->where('nik', $request->nik)->first();
        // dd($user->id);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
            'nik' => ['required',Rule::unique('users')->ignore($user->id)],
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
        //update table Owner
        $owner->update([
            'name'     => $request->name, 
            'email'   => $request->email,
            'nik' => $request->nik,
            'foto_ktp' => $request->foto_ktp,
            'no_hp' => $request->no_hp,
            'doc_mou' => $request->doc_mou,
        ]);
        $user->update($request->only('name', 'email' ,'nik'));
        $query = Owner::latest()->get();

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
        $owner = Owner::find($id);
        // dump($id);
        // dump($owner->id);
        $user = User::where('email', $owner->email)->where('nik', $owner->nik)->first();
        // dd($user->id);
        //delete post by ID
        Owner::where('id', $owner->id)->delete();
        User::where('id', $user->id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}