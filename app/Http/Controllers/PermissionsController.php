<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:budget-list|budget-create|budget-edit|budget-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:budget-create', ['only' => ['create','store']]);
        // $this->middleware('permission:budget-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:budget-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $permission = Permission::selectRaw('permissions.*,module.name as module')
                        ->join('module','module.id','=','permissions.group_name')
                        ->orderby('module.name','asc')
                        ->get();

        $module_name = Module::where('status','=','0')->orderby('name','asc')->get();


        if($request->ajax())
        {
            return datatables()->of($permission)
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
        return view('usermanagement.permission.permissions',compact('permission', 'module_name'));
    }
    public function create(){

    }
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $validation_rules = Validator::make(
            $request->all(),
            [
                'txtModule' => 'required',
                'txtPermissions' => 'required',
                'txtName' => 'unique:permissions,name'
            ],
            [

                'txtPermissions.required' => 'Tingkat Permissions wajib diisi',
                'txtModule.required' => 'Nama Module Wajib diisi',
                'txtName' => 'Permissions sudah terdaftar'
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }


        $prefix = Module::find($request->txtModule);

        $prefix_name = $prefix->alias.'-'.$request->txtPermissions;

        $permissions = Permission::create([
            'name' => $prefix_name,
            'level' => $request->txtPermissions,
            'group_name' => $request->txtModule,
        ]);
        return response()->json($permissions);
    }
     public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {

    }
    public function update(Request $request, string $id)
    {


    }
    public function destroy(string $id)
    {

    }
    public function check_alias($id)
    {
        // dd($id);
        $module = Module::find($id);

        return response()->json($module);
    }
}
