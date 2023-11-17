<?php

namespace App\Http\Controllers\Dipanel;

use Illuminate\Http\Request;
use App\Models\OrgChartModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
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
        $orgchart = OrgChartModel::orderby('nama_subdit', 'asc')->get();
        if ($request->ajax()) {
            return datatables()->of($orgchart)
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

        return view('kepegawaian.orgchart.index');
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
        $data = $request->all();
        $validation_rules = Validator::make(
            $request->all(),
            [
                'txtSubdit' => 'required|min:3|unique:organization,nama_subdit|max:100',
                'txtPrefix' => 'required|min:3|max:10',
            ],
            [
                'txtSubdit.required' => 'Satker/Subdit wajib diisi',
                'txtSubdit.min' => 'Nama Satker/Subdit minimal 3 karakter',
                'txtSubdit.max' => 'Nama Satker/Subdit maksimal 50 karakter',
                'txtSubdit.unique' => 'Nama Satker/Subdit sudah terdaftar',
                'txtPrefix.required' => 'Prefix Wajib diisi',
                'txtPrefix.min' => 'Nama Prefix minimal 3 karakter',
                'txtPrefix.max' => 'Nama Prefix maksimal 10 karakter',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }
        $Orgchart = OrgChartModel::create([
            'nama_subdit' => strtoupper($request->txtSubdit),
            'prefix_subdit' => strtoupper($request->txtPrefix),
        ]);
        return response()->json($Orgchart);
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

        $orgchart = OrgChartModel::find($id);
        return response()->json($orgchart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->all();
        $Orgchart = OrgChartModel::find($id);
        // dd($Orgchart->id);

        $validation_rules = Validator::make(
            $request->all(),
            [
                'txtSubdit' => 'required|min:3|max:100|unique:organization,nama_subdit,'. $Orgchart->id,

            ],
            [
                'txtSubdit.required' => 'Satker/Subdit wajib diisi',
                'txtSubdit.min' => 'Nama Satker/Subdit minimal 3 karakter',
                'txtSubdit.max' => 'Nama Satker/Subdit maksimal 50 karakter',
                'txtSubdit.unique' => 'Nama Satker/Subdit sudah terdaftar',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 400, 'error' => $validation_rules->errors()->toArray()]);
        }

        $updateSubdit = strtoupper($request->txtSubdit);
        $updateOrgchart = OrgChartModel::where('id', $id)->update(array('nama_subdit' => $updateSubdit, 'updated_at' => now()));
        // dd($updateOrgchart);
        return response()->json($updateOrgchart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orgchart = OrgChartModel::find($id)->delete();
        return response()->json($orgchart);
    }
}
