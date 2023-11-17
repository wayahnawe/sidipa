<?php

namespace App\Http\Controllers\Dipanel;

use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use App\Models\OrgChartModel;
use App\Models\GolonganTPDModel;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
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
        $employees = EmployeeModel::orderby('golongan','asc')->get();

        if ($request->ajax()) {
            return datatables()->of($employees)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots fs-5"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3 text-primary" id="' . $data->id . '" href="/adminpanel/employee/'.$data->id.'/edit"><i class="fs-4 ti ti-edit"></i>Edit</a>
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
        return view('kepegawaian.kepegawaian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golongan = GolonganTPDModel::orderby('golongan','asc')->get();
        $subdit = OrgChartModel::orderby('nama_subdit','asc')->get();
        return view('kepegawaian.kepegawaian.create',compact('golongan','subdit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->ttl != null){
            $validation_rules = Validator::make(
                $request->all(),
                [
                    'name' => 'required|min:3|max:100',
                    'nip' => 'required|min:3|max:25',
                    'golongan' => 'required',
                    'status' => 'required',
                    'ttl' => 'date|before: -17 years'
                ],
                [
                    'name.required' => 'Nama Pegawai wajib diisi',
                    'name.min' => 'Nama minimal 3 karakter',
                    'name.max' => 'Nama maksimal 100 Karakter',
                    'nip.required' => 'NIP tidak boleh kosong',
                    'nip.min' => 'NIP minimal 3 Karakter',
                    'nip.max' => 'NIP maksimal 25 Karakter',
                    'golongan.required' => 'Golongan wajib di pilih',
                    'status.required' => 'Status wajib di pilih',
                    'ttl.before' => "Pegawai Tidak Cukup Umur. Minimal Umur Pegawai 17 Tahun"
                ]
            );
        }else{
            $validation_rules = Validator::make(
                $request->all(),
                [
                    'name' => 'required|min:3|max:100',
                    'nip' => 'required|min:3|max:25',
                    'golongan' => 'required',
                    'status' => 'required',
                ],
                [
                    'name.required' => 'Nama Pegawai wajib diisi',
                    'name.min' => 'Nama minimal 3 karakter',
                    'name.max' => 'Nama maksimal 100 Karakter',
                    'nip.required' => 'NIP tidak boleh kosong',
                    'nip.min' => 'NIP minimal 3 Karakter',
                    'nip.max' => 'NIP maksimal 25 Karakter',
                    'golongan.required' => 'Golongan wajib di pilih',
                    'status.required' => 'Status wajib di pilih',
                    'ttl.before' => "Pegawai Tidak Cukup Umur. Minimal 17 Tahun"
                ]
            );
        }
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }
         $employee = EmployeeModel::create([
            'name' => strtoupper($request->name),
                'nip' => $request->nip,
                'golongan' => $request->golongan,
                'jabatan' => strtoupper($request->jabatan),
                'subdit' => $request->subdit,
                'eselon' => $request->eselon,
                'status' => $request->status,
                'ispejabat' => $request->ispejabat,
                'gapok' => $request->gapok,
                'email' => $request->email,
                'tlahir' => $request->tlahir,
                'ttl' => $request->ttl,
                'alamat' => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota' => $request->kota,
                'kodepos' => $request->kodepos,
                'notelp' => $request->notelp,
                'telegram' => $request->telegram,
                'keterangan' => $request->keterangan
         ]);
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
    public function edit($id)
    {
        $employees = EmployeeModel::find($id);
        // dd($employees);
        $golongan = GolonganTPDModel::orderby('golongan','asc')->get();
        $subdit = OrgChartModel::orderby('nama_subdit','asc')->get();
        return view('kepegawaian.kepegawaian.edit',compact('employees','golongan','subdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->ttl != null){
            $validation_rules = Validator::make(
                $request->all(),
                [
                    'name' => 'required|min:3|max:100',
                    'nip' => 'required|min:3|max:25',
                    'golongan' => 'required',
                    'status' => 'required',
                    'ttl' => 'date|before: -17 years'
                ],
                [
                    'name.required' => 'Nama Pegawai wajib diisi',
                    'name.min' => 'Nama minimal 3 karakter',
                    'name.max' => 'Nama maksimal 100 Karakter',
                    'nip.required' => 'NIP tidak boleh kosong',
                    'nip.min' => 'NIP minimal 3 Karakter',
                    'nip.max' => 'NIP maksimal 25 Karakter',
                    'golongan.required' => 'Golongan wajib di pilih',
                    'status.required' => 'Status wajib di pilih',
                    'ttl.before' => "Pegawai Tidak Cukup Umur. Minimal Umur Pegawai 17 Tahun"
                ]
            );
        }else{
            $validation_rules = Validator::make(
                $request->all(),
                [
                    'name' => 'required|min:3|max:100',
                    'nip' => 'required|min:3|max:25',
                    'golongan' => 'required',
                    'status' => 'required',
                ],
                [
                    'name.required' => 'Nama Pegawai wajib diisi',
                    'name.min' => 'Nama minimal 3 karakter',
                    'name.max' => 'Nama maksimal 100 Karakter',
                    'nip.required' => 'NIP tidak boleh kosong',
                    'nip.min' => 'NIP minimal 3 Karakter',
                    'nip.max' => 'NIP maksimal 25 Karakter',
                    'golongan.required' => 'Golongan wajib di pilih',
                    'status.required' => 'Status wajib di pilih',
                    'ttl.before' => "Pegawai Tidak Cukup Umur. Minimal 17 Tahun"
                ]
            );
        }
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }

        $employee = EmployeeModel::where('id',$id)->update(
            array(
                'name' => strtoupper($request->name),
                'nip' => $request->nip,
                'golongan' => $request->golongan,
                'jabatan' => strtoupper($request->jabatan),
                'subdit' => $request->subdit,
                'eselon' => $request->eselon,
                'status' => $request->status,
                'ispejabat' => $request->ispejabat,
                'gapok' => $request->gapok,
                'email' => $request->email,
                'tlahir' => $request->tlahir,
                'ttl' => $request->ttl,
                'alamat' => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota' => $request->kota,
                'kodepos' => $request->kodepos,
                'notelp' => $request->notelp,
                'telegram' => $request->telegram,
                'keterangan' => $request->keterangan,
                'updated_at' => now()
                )
            );
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
