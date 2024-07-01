<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Program;
use App\Models\Joki;
use App\Models\Topup;
use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    /**
     * The above PHP code contains functions for managing services, including retrieving, adding, updating,
     * and getting details of services.
     *
     * @return The `index` method returns a view named 'admin.layanan' with data including all services,
     * table headers, and the count of table headers.
     */
    public function index(Request $request)
    {
        $services = Service::all();
        $thead = ['Nama', 'Harga', 'Deskripsi'];
        $jml = count($thead);

        if ($request->ajax()) {
            return response()->json([
                'query' => $services,
                'thead' => $thead,
                'jml' => $jml,
            ]);
        }

        return view('admin.layanan', [
            'query' => $services,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function service()
    {
        $services = Service::all();
        $thead = ['Name', 'Price', 'Description'];
        $jml = count($thead);
        return response()->json([
            'query' => $services,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addService(Request $request)
    {
        $service = Service::create($request->all());
        return response()->json([
            'data' => $service,
            'thead' => ['Name', 'Price', 'Description'],
        ]);
    }

    public function getService($id)
    {
        $service = Service::findOrFail($id);
        $thead = ['Name', 'Price', 'Description'];

        return response()->json([
            'data' => $service,
            'thead' => $thead,
        ]);
    }

    public function updateService(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $service = Service::findOrFail($id);
        $service->update($request->all());
        $thead = ['Name', 'Price', 'Description'];

        return response()->json([
            'status' => 'success',
            'data' => $service,
            'thead' => $thead,
        ]);
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

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
    public function sparepart()
    {
        $spareparts = Sparepart::all();
        $thead = ['Name', 'Price', 'Description', 'Image', 'Stock', 'Quality'];
        $jml = count($thead);
        return response()->json([
            'query' => $spareparts,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addSparepart(Request $request)
    {
        $sparepart = Sparepart::create($request->all());
        return response()->json([
            'data' => $sparepart,
            'thead' => ['Name', 'Price', 'Description', 'Image', 'Stock', 'Quality'],
        ]);
    }

    public function getSparepart($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $thead = ['Name', 'Price', 'Description', 'Image', 'Stock', 'Quality'];

        return response()->json([
            'data' => $sparepart,
            'thead' => $thead,
        ]);
    }

    public function updateSparepart(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'quality' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $sparepart = Sparepart::findOrFail($id);
        $sparepart->update($request->all());
        $thead = ['Name', 'Price', 'Description', 'Image', 'Stock', 'Quality'];

        return response()->json([
            'status' => 'success',
            'data' => $sparepart,
            'thead' => $thead,
        ]);
    }

    public function deleteSparepart($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $sparepart->delete();

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
    public function program()
    {
        $programs = Program::all();
        $thead = ['Name', 'Price', 'Description'];
        $jml = count($thead);

        // dd($programs);
        return response()->json([
            'query' => $programs,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addProgram(Request $request)
    {
        $program = Program::create($request->all());
        return response()->json([
            'data' => $program,
            'thead' => ['Name', 'Price', 'Description'],
        ]);
    }

    public function getProgram($id)
    {
        $program = Program::findOrFail($id);
        $thead = ['Name', 'Price', 'Description'];

        return response()->json([
            'data' => $program,
            'thead' => $thead,
        ]);
    }

    public function updateProgram(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $program = Program::findOrFail($id);
        $program->update($request->all());
        $thead = ['Name', 'Price', 'Description'];

        return response()->json([
            'status' => 'success',
            'data' => $program,
            'thead' => $thead,
        ]);
    }

    public function deleteProgram($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

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
    public function joki()
    {
        $jokis = Joki::all();
        $thead = ['Name', 'Price', 'Description'];
        $jml = count($thead);
        return response()->json([
            'query' => $jokis,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addJoki(Request $request)
    {
        $joki = Joki::create($request->all());
        return response()->json([
            'data' => $joki,
            'thead' => ['Name', 'Price', 'Description'],
        ]);
    }

    public function getJoki($id)
    {
        $joki = Joki::findOrFail($id);
        $thead = ['Name', 'Price', 'Description'];

        return response()->json([
            'data' => $joki,
            'thead' => $thead,
        ]);
    }

    public function updateJoki(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $joki = Joki::findOrFail($id);
        $joki->update($request->all());
        $thead = ['Name', 'Price', 'Description'];

        return response()->json([
            'status' => 'success',
            'data' => $joki,
            'thead' => $thead,
        ]);
    }

    public function deleteJoki($id)
    {
        $joki = Joki::findOrFail($id);
        $joki->delete();

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
    public function topup()
    {
        $topups = Topup::all();
        $thead = ['Name', 'Price'];
        $jml = count($thead);

        // dd($topups);
        return response()->json([
            'query' => $topups,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addTopup(Request $request)
    {
        $topup = Topup::create($request->all());
        return response()->json([
            'data' => $topup,
            'thead' => ['Name', 'Price'],
        ]);
    }

    public function getTopup($id)
    {
        $topup = Topup::findOrFail($id);
        $thead = ['Name', 'Price'];

        return response()->json([
            'data' => $topup,
            'thead' => $thead,
        ]);
    }

    public function updateTopup(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $topup = Topup::findOrFail($id);
        $topup->update($request->all());
        $thead = ['Name', 'Price'];

        return response()->json([
            'status' => 'success',
            'data' => $topup,
            'thead' => $thead,
        ]);
    }

    public function deleteTopup($id)
    {
        $topup = Topup::findOrFail($id);
        $topup->delete();

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
    public function drink()
    {
        $drinks = Drink::all();
        $thead = ['Name', 'Price'];
        $jml = count($thead);

        // dd($drinks);
        return response()->json([
            'query' => $drinks,
            'thead' => $thead,
            'jml' => $jml,
        ]);
    }

    public function addDrink(Request $request)
    {
        $drink = Drink::create($request->all());
        return response()->json([
            'data' => $drink,
            'thead' => ['Name', 'Price'],
        ]);
    }

    public function getDrink($id)
    {
        $drink = Drink::findOrFail($id);
        $thead = ['Name', 'Price'];

        return response()->json([
            'data' => $drink,
            'thead' => $thead,
        ]);
    }

    public function updateDrink(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $drink = Drink::findOrFail($id);
        $drink->update($request->all());
        $thead = ['Name', 'Price'];

        return response()->json([
            'status' => 'success',
            'data' => $drink,
            'thead' => $thead,
        ]);
    }

    public function deleteDrink($id)
    {
        $drink = Drink::findOrFail($id);
        $drink->delete();

        // Set flash message
        session()->flash('success', 'Data berhasil dihapus!');

        return response()->json(['status' => 'success']);
    }
}
