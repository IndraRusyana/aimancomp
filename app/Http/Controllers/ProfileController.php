<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Investor;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $role = Auth::user()->role;
        $nik = Auth::user()->nik;
        if ($role == 'owner') {
            $query = Owner::where('nik', $nik)->first();
            $columnsSubset = ['name', 'email', 'nik'];
        } elseif ($role == 'admin') {
            $query = Admin::where('nik', $nik)->first();
            $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'doc_mou'];
        } elseif ($role == 'investor') {
            $query = Investor::where('nik', $nik)->first();
            $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'jml_investasi', 'prsnt_investasi', 'doc_mou'];
        }
        
        // dd($query);

        return view('admin.profile', compact('query','columnsSubset'));
    }
    
    public function update(Request $request)
    {

        $role = Auth::user()->role;
        $nik = Auth::user()->nik;
        $email = Auth::user()->email;
        if ($role == 'owner') {
            $query = Owner::where('nik', $nik)->first();
            $columnsSubset = ['name', 'email', 'nik'];
        } elseif ($role == 'admin') {
            $query = Admin::where('nik', $nik)->first();
            $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'doc_mou'];
        } elseif ($role == 'investor') {
            $query = Investor::where('nik', $nik)->first();
            $columnsSubset = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'jml_investasi', 'prsnt_investasi', 'doc_mou'];
        }

        // Dapatkan user terkait admin
        $user = User::where('email', $email)->where('nik', $nik)->first();

        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
            'nik' => ['required',Rule::unique('users')->ignore($user->id)],
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('columnsSubset', $columnsSubset);
        }
        
        //update table admin
        $query->update($request->all());
        $user->update($request->only('name', 'email' ,'nik'));
        $query = Admin::latest()->get();

        //return response
        return redirect()->route('profile.index')->with('success', 'Data updated successfully');
    }
}