<?php

namespace App\Http\Controllers\Dipanel;

use App\Models\TarifModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CurrencyModel;
use Illuminate\Support\Facades\Validator;

class TarifController extends Controller
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
        $tarif = TarifModel::orderby('nama','ASC')->get();
        if($request->ajax())
        {
            return datatables()->of($tarif)
                ->addColumn('action', function($data){
                   $button = '<a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots fs-5"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3 text-primary" id="' . $data->id . '" href="/adminpanel/tarif/'.$data->id.'/edit"><i class="fs-4 ti ti-edit"></i>Edit</a>
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
        return view('kepegawaian.tarif.index',compact('tarif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currency = CurrencyModel::all();
        return view('kepegawaian.tarif.create',compact('currency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation_rules = Validator::make(
            $request->all(),
            [
                'txtNegara' => 'required|min:3',
                'txtLokasi' => 'required|min:3',
            ],
            [
                'txtNegara.required' => 'Nama Negara / Provinsi wajib diisi',
                'txtNegara.min' => 'Nama Negara / Provinsi Minimal 3 Karakter',
                'txtLokasi.required' => 'Nama Kota / Lokasi wajib diisi',
                'txtLokasi.min' => 'Nama Kota / Lokasi Minimal 3 Karakter',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }
        $TarifUHPD = TarifModel::create([
            'nama' => strtoupper($request->txtNegara),
            'lokasi' => strtoupper($request->txtLokasi),
            'uang_harian' => $request->UangHarianGlobal,
            'uang_harian_1' => $request->UangHarianGolI,
            'uang_harian_2' => $request->UangHarianGolIII,
            'uang_harian_3' => $request->UangHarianGolIV,
            'uang_harian_4' => $request->UangHarianGolEselon,
            'uang_saku' => $request->UangSaku,
            'bintang_1' => $request->txtBintang1,
            'bintang_2' => $request->txtBintang2,
            'bintang_3' => $request->txtBintang3,
            'bintang_4' => $request->txtBintang4,
            'bintang_5' => $request->txtBintang5,
            'taxi' => $request->BiayaTaxi,
            'mata_uang' => strtoupper($request->txtCurrency),
            'kurs' => $request->TukarKurs,
            'isdomestik'=> $request->isdomestik,
        ]);
        return response()->json($TarifUHPD);
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
        $tarif = TarifModel::find($id);

        $currency = CurrencyModel::all();
        return view('kepegawaian.tarif.edit',compact('tarif','currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validation_rules = Validator::make(
            $request->all(),
            [
                // 'txtNegara' => 'required|min:3',
                'txtLokasi' => 'required|min:3',
            ],
            [
                // 'txtNegara.required' => 'Nama Negara / Provinsi wajib diisi',
                // 'txtNegara.min' => 'Nama Negara / Provinsi Minimal 3 Karakter',
                'txtLokasi.required' => 'Nama Kota / Lokasi wajib diisi',
                'txtLokasi.min' => 'Nama Kota / Lokasi Minimal 3 Karakter',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }

        $TarifUHPD = TarifModel::where('id',$id)->update(
            array(
            // 'nama' => strtoupper($request->txtNegara),
            'lokasi' => strtoupper($request->txtLokasi),
            'uang_harian' => $request->UangHarianGlobal,
            'uang_harian_1' => $request->UangHarianGolI,
            'uang_harian_2' => $request->UangHarianGolIII,
            'uang_harian_3' => $request->UangHarianGolIV,
            'uang_harian_4' => $request->UangHarianGolEselon,
            'uang_saku' => $request->UangSaku,
            'bintang_1' => $request->txtBintang1,
            'bintang_2' => $request->txtBintang2,
            'bintang_3' => $request->txtBintang3,
            'bintang_4' => $request->txtBintang4,
            'bintang_5' => $request->txtBintang5,
            'taxi' => $request->BiayaTaxi,
            'mata_uang' => strtoupper($request->txtCurrency),
            'kurs' => $request->TukarKurs,
            'isdomestik'=> $request->isdomestik
        ));
        return response()->json($TarifUHPD);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarif = TarifModel::find($id)->delete();
        return response()->json($tarif);
    }
}
