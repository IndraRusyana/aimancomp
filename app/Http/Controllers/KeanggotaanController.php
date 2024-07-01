<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Admin;
use App\Models\Investor;
use App\Models\Owner;

class KeanggotaanController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::all();
        $thead = ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Doc_mou'];
        $jml = count($thead);

        if ($request->ajax()) {
            return response()->json([
                'query' => $services,
                'thead' => $thead,
                'jml' => $jml,
            ]);
        }

        return view('admin.keanggotaan', [
            'query' => $admins,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function admin()
    {
        $admins = Admin::all();
        $thead = ['Name', 'Email', 'Nik', 'Foto_ktp', 'No_hp', 'Doc_mou'];
        $jml = count($thead);
        return response()->json([
            'query' => $admins,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addAdmin(Request $request)
    {
        $request->merge([
            'password' => bcrypt('password')
        ]);
        
        $admin = Admin::create($request->all());

        // Adding new data to the request
        $request->merge([
            'role' => 'admin',
        ]);

        User::create($request->all());

        return response()->json([
            'data' => $admin,
            'thead' => ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Doc_mou'],
        ]);
    }

    public function getAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $thead = ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Doc_mou'];

        return response()->json([
            'data' => $admin,
            'thead' => $thead,
        ]);
    }

    public function updateAdmin(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'nik' => 'required|numeric',
            'foto_ktp' => 'required|string',
            'no_hp' => 'required|numeric',
            'doc_mou' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = Admin::findOrFail($id);

        $email = $admin->email;
        $user = User::where('email', $email)->firstOrFail();

        $admin->update($request->all());
        $user->update($request->only('name', 'email'));
        $thead = ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Doc_mou'];

        return response()->json([
            'status' => 'success',
            'data' => $admin,
            'thead' => $thead,
        ]);
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        $user = User::findOrFail($id);
        $user->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }

    public function investor()
    {
        $investors = Investor::all();
        $thead = ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Jml_investasi', 'Prsnt_investasi', 'Doc_mou'];
        $jml = count($thead);
        return response()->json([
            'query' => $investors,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addInvestor(Request $request)
    {
        $request->merge([
            'password' => bcrypt('password')
        ]);
        
        $investor = Investor::create($request->all());

        // Adding new data to the request
        $request->merge([
            'role' => 'investor',
        ]);

        User::create($request->all());

        return response()->json([
            'data' => $investor,
            'thead' => ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Jml_investasi', 'Prsnt_investasi', 'Doc_mou'],
        ]);
    }

    public function getInvestor($id)
    {
        $investor = Investor::findOrFail($id);
        $thead = ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Jml_investasi', 'Prsnt_investasi', 'Doc_mou'];

        return response()->json([
            'data' => $investor,
            'thead' => $thead,
        ]);
    }

    public function updateInvestor(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:investors',
            'nik' => 'required|numeric',
            'foto_ktp' => 'required|string',
            'no_hp' => 'required|numeric',
            'jml_investasi' => 'required|numeric',
            'prsnt_investasi' => 'required|numeric',
            'doc_mou' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $investor = Investor::findOrFail($id);

        // Ambil email dari investor
        $email = $investor->email;

        // Cari user berdasarkan email
        $user = User::where('email', $email)->firstOrFail();
        $investor->update($request->all());
        $user->update($request->only('name', 'email'));
        $thead = ['Name', 'Email', 'Nik', 'foto_ktp', 'No_hp', 'Jml_investasi', 'Prsnt_investasi', 'Doc_mou'];

        return response()->json([
            'status' => 'success',
            'data' => $investor,
            'thead' => $thead,
        ]);
    }

    public function deleteInvestor($id)
    {
        $investor = Investor::findOrFail($id);
        $investor->delete();

        $user = User::findOrFail($id);
        $user->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }

    public function owner()
    {
        $owners = Owner::all();
        $thead = ['Name', 'Email'];
        $jml = count($thead);
        return response()->json([
            'query' => $owners,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addOwner(Request $request)
    {
        $request->merge([
            'password' => bcrypt('password')
        ]);
        
        $owner = Owner::create($request->all());

        // Adding new data to the request
        $request->merge([
            'role' => 'owner',
        ]);

        User::create($request->all());

        return response()->json([
            'data' => $owner,
            'thead' => ['Name', 'Email'],
        ]);
    }  

    public function getOwner($id)
    {
        $owner = Owner::findOrFail($id);
        $thead = ['Name', 'Email'];

        return response()->json([
            'data' => $owner,
            'thead' => $thead,
        ]);
    }

    public function updateOwner(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:owners',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $owner = Owner::findOrFail($id);

        // Ambil email dari Owner
        $email = $owner->email;

        // Cari user berdasarkan email
        $user = User::where('email', $email)->firstOrFail();
        $owner->update($request->all());
        $user->update($request->only('name', 'email'));
        $thead = ['Name', 'Email'];

        return response()->json([
            'status' => 'success',
            'data' => $owner,
            'thead' => $thead,
        ]);
    }

    public function deleteOwner($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        $user = User::findOrFail($id);
        $user->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }
}