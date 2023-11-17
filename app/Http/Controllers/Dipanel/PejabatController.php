<?php

namespace App\Http\Controllers\Dipanel;

use App\Models\PejabatModel;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PejabatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employee = EmployeeModel::orderby('name','asc')->get();

        $pejabat = PejabatModel::selectRaw('daftar_pejabat.*,employees.name')
                    ->join('employees','employees.id','=','daftar_pejabat.id_name')
                    ->get();
        // dd($pejabat);
        if ($request->ajax()) {
            return datatables()->of($pejabat)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots fs-5"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3 text-primary" id="' . $data->id . '" href="javascript:void(0)" onclick="editData(`' . $data->id . '`)"><i class="fs-4 ti ti-edit"></i>Edit</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3 text-danger" id="' . $data->id . '" href="javascript:void(0)" onclick="deleteData(`' . $data->id . '`)"><i class="fs-4 ti ti-trash"></i>Delete</a>
                            </li>
                          </ul>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kepegawaian.pejabat.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation_rules = Validator::make(
            $request->all(),
            [
                'TxtPegawai' => 'required',
                'TxtTPD' => 'required',
            ],
            [
                'TxtPegawai.required' => 'Nama Pejabat wajib diisi',
                'TxtTPD.required' => 'Jabatan Wajib diisi',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }
        $DaftarPejabat = PejabatModel::create([
            'id_name' => $request->TxtPegawai,
            'jabatan' => strtoupper($request->TxtTPD),
        ]);
        return response()->json($DaftarPejabat);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $DaftarPejabat = PejabatModel::selectRaw('daftar_pejabat.*,employees.name,employees.id as id_pegawai')
                    ->join('employees','employees.id','=','daftar_pejabat.id_name')
                    ->where('daftar_pejabat.id',$id)
                    ->first();
        return response()->json($DaftarPejabat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pejabat = PejabatModel::where('id',$id)->update(
            array(
                'id_name' => $request->id_pegawai,
                'jabatan' => $request->txtTPD
            )
        );
        return response()->json($pejabat);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pejabat = PejabatModel::find($id)->delete();
        return response()->json($pejabat);
    }
}
