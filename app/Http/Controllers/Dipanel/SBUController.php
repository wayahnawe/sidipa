<?php

namespace App\Http\Controllers\Dipanel;

use App\Http\Controllers\Controller;
use App\Models\CurrencyModel;
use App\Models\SBUModel;
use Illuminate\Http\Request;

class SBUController extends Controller
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
        $sbus = SBUModel::orderby('nama','ASC')->get();
        if($request->ajax())
        {
            return datatables()->of($sbus)
                ->addColumn('action', function($data){
                    /* $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>'; */
                    $button = '<button type="button" name= "edit" class="btn btn-sm btn-primary" id="'.$data->id.'" onclick="editData('.$data->id.')"><i class="ti ti-pencil" ></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" onclick="deleteData('.$data->id.')" class="delete btn btn-danger btn-sm"><i class="ti ti-trash"></i></button>';
                    /* $button .= '<button type="button" name="delete" id="'.$data->id.'" onclick="deleteData('.$data->id.')" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>'; */
                    return $button;
                    })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kepegawaian.sbu.index',compact('sbus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currency = CurrencyModel::all();
        return view('kepegawaian.sbu.create',compact('currency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
