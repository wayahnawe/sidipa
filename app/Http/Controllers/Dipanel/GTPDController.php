<?php

namespace App\Http\Controllers\Dipanel;

use App\Models\GTPDModel;
use Illuminate\Http\Request;
use App\Models\GolonganTPDModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GTPDController extends Controller
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
        $gtpd = GolonganTPDModel::orderby('golongan','asc')->get();
        if ($request->ajax()) {
            return datatables()->of($gtpd)
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
        return view('kepegawaian.gtpd.gtpd');
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
                'txtPangkat' => 'required|min:3|unique:golongan_tpd,pangkat|max:100',
                'TxtPD' => 'required',
                'TxtGrade' => 'required',
                'txtGolongan' => 'required',
            ],
            [
                'txtPangkat.required' => 'Nama Pangkat wajib diisi',
                'txtPangkat.min' => 'Nama Pangkat minimal 3 karakter',
                'txtPangkat.max' => 'Nama Pangkat maksimal 100 karakter',
                'txtPangkat.unique' => 'Nama Pangkat sudah terdaftar',
                'TxtPD.required' => 'Tingkat Perjalanan Dinas Wajib diisi',
                'TxtGrade.required' => 'Grade Wajib diisi',
                'txtGolongan.required' => 'Golongan Wajib diisi',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }
        $gtpds = GolonganTPDModel::create([
            'pangkat' => $request->txtPangkat,
            'golongan' => strtoupper($request->txtGolongan),
            'grade' => $request->TxtGrade,
            'list_rank' => strtoupper($request->txtGolongan).''.$request->TxtGrade,
            'tpd' => $request->TxtPD,
        ]);
        return response()->json($gtpds);
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
        $gtpds = GolonganTPDModel::find($id);
        return response()->json($gtpds);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validation_rules = Validator::make(
            $request->all(),
           [
                'TxtPD' => 'required',
                'TxtGrade' => 'required',
                'txtGolongan' => 'required',
            ],
            [
                'TxtPD.required' => 'Tingkat Perjalanan Dinas Wajib diisi',
                'TxtGrade.required' => 'Grade Wajib diisi',
                'txtGolongan.required' => 'Golongan Wajib diisi',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }
        $updateGTPD = GolonganTPDModel::where('id', $id)->update(
            array(
                'golongan' => strtoupper($request->txtGolongan),
                'grade' => $request->TxtGrade,
                'tpd' => $request->TxtPD,
                 'list_rank' => strtoupper($request->txtGolongan).''.$request->TxtGrade,
                'updated_at' => now()
            ));
        return response()->json($updateGTPD);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gtpds = GolonganTPDModel::find($id)->delete();
        return response()->json($gtpds);
    }
}
