<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
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
        $module_name = Module::orderby('name','ASC')->get();
        if($request->ajax())
        {

            return datatables()->of($module_name)
                ->addColumn('action', function($data){
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
        return view('usermanagement.permission.module',compact('module_name'));
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
        // dd($data);
        $validation_rules = Validator::make(
            $request->all(),
            [
                'txtName' => 'required|unique:module,name',
                'txtAlias' => 'required',
                'txtStatus' => 'required'
            ],
            [
                'txtName.required' => 'Nama Module wajib diisi',
                'txtName.unique' => 'Nama Module sudah terdaftar',
                'txtAlias.required' => 'Prefix Module Wajib diisi',
                'txtStatus.required' => 'Status Module Wajib dipilih',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }
        $module_name = Module::create([
            'name' => $request->txtName,
            'alias' => $request->txtAlias,
            'status' => $request->txtStatus,
        ]);
        return response()->json($module_name);
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
        $module = Module::findorFail($id);
        return response()->json($module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        if($request->txtAlias == null){

            $module_name = Module::where('id',$id)->update(
                array(
                    'status' => $request->txtStatus,
                )
            );

        }else{
            $module_name = Module::where('id',$id)->update(
                array(
                    'alias' => $request->txtAlias,
                    'status' => $request->txtStatus,
                )
            );
        }
        return response()->json($module_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $module_name = Module::find($id)->delete();
        return response()->json($module_name);
    }
}
