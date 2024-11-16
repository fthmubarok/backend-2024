<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    //function untuk menampilkan seluruh data pasien
    public function index() {
        $patients = Patient::all(); //mengambil seluruh data paien

        //logic jika seluruh data pasien ditemukan maka akan ditampkan datanya jika tidak makan akan keluar pesan error
        if($patients) {
            $data = [
                'message' => 'Get all patients',
                'data' => $patients
            ];
        } else {
            $data = [
                'message' => 'Patient is empty'
            ];
        }

        return response()->json($data, 200);
    }

    //function untuk menginput data pasien
    public function store(Request $request) {
        // menangkap data request
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'required',
            'out_date_at' =>'required'
        ]);

        //divalidasi terlebih dahulu
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'error' => $validator->errors()
            ], 422);
        }

        // menggunakan model patient untuk insert data
        $patient = Patient::create($request->all());
        $data = [
            'message' => 'Patient is created succesfully',
            'data' => $patient,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    //function untuk mengupdate data pasien berdasarkan id
    public function update(Request $request, $id){
        $patient = Patient::find($id); //mencari data pasien berdasarkan id

        // menangkap data request dan diberikan data baru
        if ($patient) {
            $input = [
                'name' => $request->name ?? $request->name,
                'phone' => $request->phone ?? $request->phone,
                'address' => $request->address ?? $request->address,
                'status' => $request->status ?? $request->status,
                'in_date_at' => $request->in_date_at ?? $request->in_date_ate,
                'out_date_at' => $request->out_date_at ?? $request->out_date_at
            ];
         
            $patient->update($input);

            $data = [
                'message' => 'Patient is updated',
                'data' => $patient,
            ];
            return response()->json($data, 200);
            
        } else {
            $data = [
                'message' => 'Data not found'
            ];
            return response()->json($data, 404);
        }
    }

    //function untuk menghapus data pasien berdasarkan id
    public function destroy($id){
        $patient = Patient::find($id); //mencari data pasien berdasarkan id

        //logic jika id pasien ditemukan maka data tersebut akan dihapus jika tidak ditemukan maka akan muncul pesan error
        if ($patient) {
            $patient->delete();

            $data = [
                'message' => 'patient is deleted'
            ];
            return response()->json($data, 200);

        } else {
            $data = [
                'message' => 'Data not found'
            ];
            return response()->json($data, 404);
        }
    }

    //function untuk menampilkan data berdasarkan id
    public function show($id)
    {
    $patient = Patient::find($id); //mencari pasien berdasarkan id

    //jika id pasien ditemukan maka data pasien tersebut ditampilkan jika tidak maka akan muncul pesan error
    if ($patient) {
        return response()->json([
            'message' => 'Get detail patient',
            'data' => $patient,
        ], 200);
    }

    return response()->json([
        'message' => 'Patient not found',
    ], 404);
}

//function untuk mencari pasien yang berstatus positive
public function showPositive()
{
    // mencari data pasien dengan status "positive"
    $patients = Patient::where('status', 'positive')->get();

    //jika ditemukan maka seluruh data pasien yang berstatus positive akan dimunculkan jika tidak ada maka kan muncul pesan
    if ($patients->isNotEmpty()) {
        return response()->json([
            'message' => 'Get patients with status positive',
            'data' => $patients,
        ], 200);
    }

    return response()->json([
        'message' => 'No patients found with status positive',
    ], 404);
}

    //function untuk mencari data pasien yang berstatus "recovered"
    public function showRecovered()
    {
    // mencari data pasien dengan status "recovered"
    $patients = Patient::where('status', 'recovered')->get();

    //jika ditemukan maka seluruh data pasien yang berstatus recovered akan dimunculkan jika tidak ada maka kan muncul pesan
    if ($patients->isNotEmpty()) {
        $data = [
            'message' => 'Get patients with status recovered',
            'data' => $patients,
        ];
        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'No patients found with status recovered',
        ];
        return response()->json($data, 404);
    }
}

//function untuk mencari data pasien yang berstatus "dead"
public function showDead()
{
    $patients = Patient::where('status', 'dead')->get();    // mencari data pasien dengan status "dead"

    //jika ditemukan maka seluruh data pasien yang berstatus dead akan dimunculkan jika tidak ada maka kan muncul pesan
    if ($patients->isNotEmpty()) {
        $data = [
            'message' => 'Get patients with status dead',
            'data' => $patients,
        ];
        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'No patients found with status dead',
        ];
        return response()->json($data, 404);
    }
}


}


