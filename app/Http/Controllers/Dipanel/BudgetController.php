<?php

namespace App\Http\Controllers\Dipanel;

use App\Models\BudgetModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BudgetController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:budget-list|budget-create|budget-edit|budget-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:budget-create', ['only' => ['create','store']]);
        // $this->middleware('permission:budget-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:budget-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $budget = BudgetModel::orderby('nama_anggaran','ASC')->get();
        if($request->ajax())
        {
            return datatables()->of($budget)
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
        return view('kepegawaian.pagu.index');
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
        dd($request->all());



        /*
        "tahun_anggaran" => null
        "txtUUID" => null
        "id_anggaran" => null
        "kode_anggaran" => null
        "txtBudget_Anggaran" => null
        "budget_anggaran" => null
        "nama_anggaran" => null

        */
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
        $budget = BudgetModel::find($id);
        return response()->json($budget);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
