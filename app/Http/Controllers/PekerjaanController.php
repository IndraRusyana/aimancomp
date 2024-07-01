<?php

namespace App\Http\Controllers;

use App\Models\JobService;
use App\Models\JobSparepart;
use App\Models\JobProgram;
use App\Models\JobJoki;
use App\Models\JobTopup;
use App\Models\JobDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PekerjaanController extends Controller
{
    public function index(Request $request)
    {
        $jobservices = JobService::all();
        $thead = ['Merk', 'Gambar', 'Kondisi_masuk', 'Keluhan', 'Solusi', 'Status', 'Harga'];
        $jml = count($thead);

        if ($request->ajax()) {
            return response()->json([
                'query' => $jobservices,
                'thead' => $thead,
                'jml' => $jml,
            ]);
        }

        return view('admin.pekerjaan', [
            'query' => $jobservices,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function JobService()
    {
        $jobservices = JobService::all();
        $thead = ['Merk', 'Gambar', 'Kondisi_masuk', 'Keluhan', 'Solusi', 'Status', 'Harga'];
        $jml = count($thead);
        return response()->json([
            'query' =>  $jobservices,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addJobService(Request $request)
    {
        $jobservices = JobService::create($request->all());
        return response()->json([
            'data' => $jobservices,
            'thead' => ['Merk', 'Gambar', 'Kondisi_masuk', 'Keluhan', 'Solusi', 'Status', 'Harga'],
        ]);
    }

    public function getJobService($id)
    {
        $jobservices = JobService::findOrFail($id);
        $thead = ['Merk', 'Gambar', 'Kondisi_masuk', 'Keluhan', 'Solusi', 'Status', 'Harga'];

        return response()->json([
            'data' => $jobservices,
            'thead' => $thead,
        ]);
    }

    public function updateJobService(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'merk' => 'required|string|max:255',
            'gambar' => 'required|string|max:255', // atau 'required|image' jika ingin memvalidasi sebagai file gambar
            'kondisi_masuk' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'solusi' => 'required|string',
            'status' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobservices = JobService::findOrFail($id);
        $jobservices->update($request->all());
        $thead = ['Merk', 'Gambar', 'Kondisi_masuk', 'Keluhan', 'Solusi', 'Status', 'Harga'];

        return response()->json([
            'status' => 'success',
            'data' => $jobservices,
            'thead' => $thead,
        ]);
    }

    public function deleteJobService($id)
    {
        $jobservices = JobService::findOrFail($id);
        $jobservices->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }

    /**
     * The above PHP code contains functions for managing spare parts, including retrieving all spare
     * parts, adding a new spare part, getting a specific spare part by ID, and updating a spare part with
     * validation.
     *
     * @return The `sparepart()` function returns a JSON response containing all spare parts, table
     * headers, and the count of table headers. The `addSparepart()` function returns a JSON response
     * containing the newly created spare part data and table headers. The `getSparepart()` function
     * returns a JSON response containing the specific spare part data for the given ID and table headers.
     * The `update
     */
    public function JobSparepart()
    {
        $jobspareparts = JobSparepart::all();
        $thead = ['Nama', 'Gambar', 'Harga_awal', 'Harga_jual', 'Kualitas', 'Jumlah'];
        $jml = count($thead);
        return response()->json([
            'query' => $jobspareparts,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addJobSparepart(Request $request)
    {
        $jobsparepart = JobSparepart::create($request->all());
        return response()->json([
            'data' => $jobsparepart,
            'thead' => ['Nama', 'Gambar', 'Harga_awal', 'Harga_jual', 'Kualitas', 'Jumlah'],
        ]);
    }

    public function getJobSparepart($id)
    {
        $jobsparepart = JobSparepart::findOrFail($id);
        $thead = ['Nama', 'Gambar', 'Harga_awal', 'Harga_jual', 'Kualitas', 'Jumlah'];

        return response()->json([
            'data' => $jobsparepart,
            'thead' => $thead,
        ]);
    }

    public function updateJobSparepart(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'gambar' => 'required|string|max:255', // atau 'required|image' jika ingin memvalidasi sebagai file gambar
            'nama' => 'required|string|max:255',
            'harga_awal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'kualitas' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobspareparts = JobSparepart::findOrFail($id);
        $jobspareparts->update($request->all());
        $thead = ['Nama', 'Gambar', 'Harga_awal', 'Harga_jual', 'Kualitas', 'Jumlah'];

        return response()->json([
            'status' => 'success',
            'data' => $jobspareparts,
            'thead' => $thead,
        ]);
    }

    public function deleteJobSparepart($id)
    {
        $jobspareparts = JobSparepart::findOrFail($id);
        $jobspareparts->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }

    /**
     * The above PHP code contains functions for managing programs including retrieving, adding, getting by
     * ID, and updating program data.
     *
     * @return The `program()` function returns a JSON response containing the list of all programs, the
     * table headers (`thead`), and the count of table headers (`jml`).
     */
    public function JobProgram()
    {
        $jobprograms = JobProgram::all();
        $thead = ['Nama_project', 'Client', 'Harga', 'Deskripsi', 'Estimasi_waktu_pengerjaan', 'Input_dokumen'];
        $jml = count($thead);

        // dd($jobprograms);
        return response()->json([
            'query' => $jobprograms,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addJobProgram(Request $request)
    {
        $jobprograms = JobProgram::create($request->all());
        return response()->json([
            'data' => $jobprograms,
            'thead' => ['Nama_project', 'Client', 'Harga', 'Deskripsi', 'Estimasi_waktu_pengerjaan', 'Input_dokumen'],
        ]);
    }

    public function getJobProgram($id)
    {
        $jobprograms = JobProgram::findOrFail($id);
        $thead = ['Nama_project', 'Client', 'Harga', 'Deskripsi', 'Estimasi_waktu_pengerjaan', 'Input_dokumen'];

        return response()->json([
            'data' => $jobprograms,
            'thead' => $thead,
        ]);
    }

    public function updateJobProgram(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_project' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'estimasi_waktu_pengerjaan' => 'required|string|max:255',
            'input_dokumen' => 'required|string|max:255', // atau 'required|file' jika ingin memvalidasi sebagai file
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobprograms = JobProgram::findOrFail($id);
        $jobprograms->update($request->all());
        $thead = ['Nama_project', 'Client', 'Harga', 'Deskripsi', 'Estimasi_waktu_pengerjaan', 'Input_dokumen'];

        return response()->json([
            'status' => 'success',
            'data' => $jobprograms,
            'thead' => $thead,
        ]);
    }

    public function deleteJobProgram($id)
    {
        $jobprograms = JobProgram::findOrFail($id);
        $jobprograms->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }

    /**
     * The above PHP code defines functions for managing Joki data including retrieving all Jokis, adding a
     * new Joki, getting a specific Joki by ID, and updating a Joki's information.
     *
     * @return The `joki()` function returns a JSON response containing the list of all jokis, the table
     * headers (`thead`), and the count of table headers (`jml`).
     */
    public function JobJoki()
    {
        $jobjokis = JobJoki::all();
        $thead = ['Nama_tugas', 'Client', 'Harga', 'Deskripsi', 'Estimasi_pengerjaan'];
        $jml = count($thead);
        return response()->json([
            'query' => $jobjokis,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addJobJoki(Request $request)
    {
        $jobjokis = JobJoki::create($request->all());
        return response()->json([
            'data' => $jobjokis,
            'thead' => ['Nama_tugas', 'Client', 'Harga', 'Deskripsi', 'Estimasi_pengerjaan'],
        ]);
    }

    public function getJobJoki($id)
    {
        $jobjokis = JobJoki::findOrFail($id);
        $thead = ['Nama_tugas', 'Client', 'Harga', 'Deskripsi', 'Estimasi_pengerjaan'];

        return response()->json([
            'data' => $jobjokis,
            'thead' => $thead,
        ]);
    }

    public function updateJobJoki(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_tugas' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'estimasi_pengerjaan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobjokis = JobJoki::findOrFail($id);
        $jobjokis->update($request->all());
        $thead = ['Nama_tugas', 'Client', 'Harga', 'Deskripsi', 'Estimasi_pengerjaan'];

        return response()->json([
            'status' => 'success',
            'data' => $jobjokis,
            'thead' => $thead,
        ]);
    }

    public function deleteJobJoki($id)
    {
        $jobjokis = JobJoki::findOrFail($id);
        $jobjokis->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }

    /**
     * The above PHP code contains functions for managing top-up data including listing, adding,
     * retrieving, and updating top-up information.
     *
     * @return The `topup()` function returns a JSON response containing the list of all topups, the table
     * headers ('Name', 'Price'), and the count of table headers.
     */
    public function JobTopup()
    {
        $jobtopups = JobTopup::all();
        $thead = ['Provider', 'Modal', 'Harga_jual', 'Nomor_konsumen', 'Status'];
        $jml = count($thead);

        // dd($jobtopups);
        return response()->json([
            'query' => $jobtopups,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addJobTopup(Request $request)
    {
        $jobtopups = JobTopup::create($request->all());
        return response()->json([
            'data' => $jobtopups,
            'thead' => ['Provider', 'Modal', 'Harga_jual', 'Nomor_konsumen', 'Status'],
        ]);
    }

    public function getJobTopup($id)
    {
        $jobtopups = JobTopup::findOrFail($id);
        $thead = ['Provider', 'Modal', 'Harga_jual', 'Nomor_konsumen', 'Status'];

        return response()->json([
            'data' => $jobtopups,
            'thead' => $thead,
        ]);
    }

    public function updateJobTopup(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'provider' => 'required|string|max:255',
            'modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'nomor_konsumen' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobtopups = JobTopup::findOrFail($id);
        $jobtopups->update($request->all());
        $thead = ['Provider', 'Modal', 'Harga_jual', 'Nomor_konsumen', 'Status'];

        return response()->json([
            'status' => 'success',
            'data' => $jobtopups,
            'thead' => $thead,
        ]);
    }

    public function deleteJobTopup($id)
    {
        $jobtopups = JobTopup::findOrFail($id);
        $jobtopups->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }

    /**
     * The above PHP code contains functions for managing drinks, including retrieving all drinks, adding a
     * new drink, getting a specific drink by ID, and updating a drink's information.
     *
     * @return The `drink()` method returns a JSON response containing the list of all drinks, the table
     * headers (`Name` and `Price`), and the count of table headers.
     */
    public function JobDrink()
    {
        $jobdrinks = JobDrink::all();
        $thead = ['Nama', 'Modal', 'Harga_jual'];
        $jml = count($thead);

        // dd($jobdrinks);
        return response()->json([
            'query' => $jobdrinks,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addJobDrink(Request $request)
    {
        $jobdrinks = JobDrink::create($request->all());
        return response()->json([
            'data' => $jobdrinks,
            'thead' => ['Nama', 'Modal', 'Harga_jual'],
        ]);
    }

    public function getJobDrink($id)
    {
        $jobdrinks = JobDrink::findOrFail($id);
        $thead = ['Nama', 'Modal', 'Harga_jual'];

        return response()->json([
            'data' => $jobdrinks,
            'thead' => $thead,
        ]);
    }

    public function updateJobDrink(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);
        

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobdrinks = JobDrink::findOrFail($id);
        $jobdrinks->update($request->all());
        $thead = ['Nama', 'Modal', 'Harga_jual'];

        return response()->json([
            'status' => 'success',
            'data' => $jobdrinks,
            'thead' => $thead,
        ]);
    }

    public function deleteJobDrink($id)
    {
        $jobdrinks = JobDrink::findOrFail($id);
        $jobdrinks->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }
}