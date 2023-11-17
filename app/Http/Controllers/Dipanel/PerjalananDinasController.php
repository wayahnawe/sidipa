<?php

namespace App\Http\Controllers\Dipanel;

use Carbon\Carbon;
use App\Models\SPPDModel;
use App\Models\TarifModel;
use App\Models\BudgetModel;
use App\Models\PejabatModel;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use App\Http\Controllers\Controller;
use App\Models\PerjalananDinasModel;
use Illuminate\Support\Facades\Validator;

class PerjalananDinasController extends Controller
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
        $jaldin = PerjalananDinasModel::selectRaw('spb.id,spb.nomor,spb.dasarpelaksanaan,spb.tglberangkat,spb.tglkembali,spb.status,spb.type_perjalanan,tarif_daerah.nama as tujuan')
                ->join('tarif_daerah','tarif_daerah.id','=','spb.tujuan')
                ->orderby('spb.nomor','asc')
                ->get();
        
         if ($request->ajax()) {
            return datatables()->of($jaldin)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots fs-5"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                          <a class="dropdown-item d-flex align-items-center gap-3 text-primary" id="' . $data->id . '" href="/adminpanel/perjalanan_dinas/'.$data->type_perjalanan.'/'.$data->id.'/checklist_biaya"><i class="fs-4 ti ti-list-check"></i>Check List Biaya</a>
                        </li>

                            <hr class="dropdown-divider">
                            <li>
                              <a class="dropdown-item d-flex align-items-center text-primary" id="' . $data->id . '" href="/adminpanel/perjalanan_dinas/'.$data->type_perjalanan.'/'.$data->id.'/edit"><i class="fs-4 ti ti-edit"></i>Edit</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center text-danger" id="' . $data->id . '" href="javascript:void(0)" onclick="deleteData(`' . $data->id . '`)"><i class="fs-4 ti ti-trash"></i>Delete</a>
                            </li>
                          </ul>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kepegawaian.dinas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $yearNow =  Carbon::now()->isoFormat('Y');
        $mata_anggaran = BudgetModel::where('tahun_anggaran',$yearNow)->orderby('nama_anggaran','ASC')->get();
        $daerah_tujuan = TarifModel::where('isdomestik','domestik')->orderby('nama','ASC')->get();
        return view('kepegawaian.dinas.create',compact('mata_anggaran','daerah_tujuan'));
    }

    public function domestik()
    {
        $yearNow =  Carbon::now()->isoFormat('Y');
        $mata_anggaran = BudgetModel::where('tahun_anggaran',$yearNow)->orderby('nama_anggaran','ASC')->get();
        $daerah_tujuan = TarifModel::where('isdomestik','domestik')->orderby('nama','ASC')->get();
        $pejabat_kpa = PejabatModel::selectRaw('daftar_pejabat.id_name,employees.name,daftar_pejabat.jabatan')
                        ->join('employees', 'employees.id','=','daftar_pejabat.id_name')
                        ->where('daftar_pejabat.jabatan','KPA')
                        ->orderby('employees.name','asc')
                        ->get();
        $pejabat = PejabatModel::selectRaw('daftar_pejabat.id_name,employees.name,daftar_pejabat.jabatan')
                        ->join('employees', 'employees.id','=','daftar_pejabat.id_name')
                        ->where('daftar_pejabat.jabatan','<>','KPA')
                        ->orderby('employees.name','asc')
                        ->get();
        $employees = EmployeeModel::orderby('name','asc')->get();
        return view('kepegawaian.dinas.domestik',compact('mata_anggaran','daerah_tujuan','pejabat_kpa','pejabat','employees'));
    }

    public function internasional()
    {

        $yearNow =  Carbon::now()->isoFormat('Y');
        $mata_anggaran = BudgetModel::where('tahun_anggaran',$yearNow)->orderby('nama_anggaran','ASC')->get();
        $daerah_tujuan = TarifModel::where('isdomestik','internasional')->orderby('nama','ASC')->get();
        return view('kepegawaian.dinas.internasional',compact('mata_anggaran','daerah_tujuan'));
    }

    public function edit_domestik(string $id)
    {
        $jaldin = PerjalananDinasModel::find($id);
        $mak = BudgetModel::where('id',$jaldin->mak)->first();
        $tujuan = TarifModel::where('id',$jaldin->tujuan)->first();
        $yearNow =  Carbon::now()->isoFormat('Y');
        $mata_anggaran = BudgetModel::where('tahun_anggaran',$yearNow)->orderby('nama_anggaran','ASC')->get();
        $daerah_tujuan = TarifModel::where('isdomestik','domestik')->orderby('nama','ASC')->get();
        $pejabat_kpa = PejabatModel::selectRaw('daftar_pejabat.id_name,employees.name,daftar_pejabat.jabatan')
                        ->join('employees', 'employees.id','=','daftar_pejabat.id_name')
                        ->where('daftar_pejabat.jabatan','KPA')
                        ->orderby('employees.name','asc')
                        ->get();

        $kpa_id = EmployeeModel::where('id',$jaldin->kpa_id)->first();
        $pejabat = PejabatModel::selectRaw('daftar_pejabat.id_name,employees.name,daftar_pejabat.jabatan')
                        ->join('employees', 'employees.id','=','daftar_pejabat.id_name')
                        ->where('daftar_pejabat.jabatan','<>','KPA')
                        ->orderby('employees.name','asc')
                        ->get();
        $pejabat_id = EmployeeModel::where('id',$jaldin->kasubdit_id)->first();
        $employees = EmployeeModel::orderby('name','asc')->get();
        $peserta = SPPDModel::join('employees','employees.id','=','sppd.pegawai_id')->where('spd_id',$jaldin->id)->get();
        // dd($peserta);
        return view('kepegawaian.dinas.edit_domestik',compact('jaldin','mak','tujuan','mata_anggaran','daerah_tujuan','pejabat_kpa','kpa_id','pejabat','pejabat_id','employees','peserta'));
    }

    public function edit_internasional(string $id)
    {

        $yearNow =  Carbon::now()->isoFormat('Y');
        $mata_anggaran = BudgetModel::where('tahun_anggaran',$yearNow)->orderby('nama_anggaran','ASC')->get();
        $daerah_tujuan = TarifModel::where('isdomestik','internasional')->orderby('nama','ASC')->get();
        return view('kepegawaian.dinas.internasional',compact('mata_anggaran','daerah_tujuan'));
    }

    public function peserta($id)
    {
        $peserta = EmployeeModel::join('sppd','sppd.pegawai_id','=','employees.id')->where('spd_id',$id)->get();
        $data = '';
        foreach ($peserta as $row) {

            $data .= "<option value='$row->id' selected>{$row->name}</option>";
        }
        return $data;
    }
    public function list_peserta($id)
    {
        $count = EmployeeModel::all()->count();
        $peserta = EmployeeModel::selectRaw('sppd.pegawai_id')->join('sppd','sppd.pegawai_id','=','employees.id')->where('spd_id',$id)->get();
        $data = EmployeeModel::whereNotIn('id',$peserta)->where('name', 'LIKE', '%' . request('q') . '%')->orderby('name','asc')->paginate($count);
        return response()->json($data);
    }

    public function checklist_biaya_peserta_domestik(Request $request, $id)
    {
        // dd($request->golongan);
        $golongan = $request->golongan;
        // dd($id);

        $count = EmployeeModel::all()->count();
        // $peserta_id = EmployeeModel::selectRaw('sppd.pegawai_id')
        //             ->join('sppd','sppd.pegawai_id','=','employees.id')
        //             ->where([
        //                 ['spd_id',$id],
        //                 ['employees.kode_gol',$golongan]
        //             ])->get();
        $peserta = EmployeeModel::selectRaw('sppd.pegawai_id')
                    ->join('sppd','sppd.pegawai_id','=','employees.id')
                    ->where([
                        ['sppd.spd_id',$id],
                        ['employees.kode_gol',$golongan]
                    ])
                    ->get();
        // dd($peserta);
        $data = EmployeeModel::whereIn('id',$peserta)->where('name', 'LIKE', '%' . request('q') . '%')->orderby('name','asc')->paginate($count);
        // dd($data);
        return response()->json($data);
    }
    public function checklist_biaya_domestik(Request $request, string $id)
    {


        $jaldin = PerjalananDinasModel::find($id);

        $mak = BudgetModel::where('id',$jaldin->mak)->first();
        $tujuan = TarifModel::where('id',$jaldin->tujuan)->first();
        $yearNow =  Carbon::now()->isoFormat('Y');
        $mata_anggaran = BudgetModel::where('tahun_anggaran',$yearNow)->orderby('nama_anggaran','ASC')->get();
        $daerah_tujuan = TarifModel::where('isdomestik','domestik')->orderby('nama','ASC')->get();
        $pejabat_kpa = PejabatModel::selectRaw('daftar_pejabat.id_name,employees.name,daftar_pejabat.jabatan')
                        ->join('employees', 'employees.id','=','daftar_pejabat.id_name')
                        ->where('daftar_pejabat.jabatan','KPA')
                        ->orderby('employees.name','asc')
                        ->get();

        $kpa_id = EmployeeModel::where('id',$jaldin->kpa_id)->first();
        $pejabat = PejabatModel::selectRaw('daftar_pejabat.id_name,employees.name,daftar_pejabat.jabatan')
                        ->join('employees', 'employees.id','=','daftar_pejabat.id_name')
                        ->where('daftar_pejabat.jabatan','<>','KPA')
                        ->orderby('employees.name','asc')
                        ->get();
        $pejabat_id = EmployeeModel::where('id',$jaldin->kasubdit_id)->first();
        $employees = EmployeeModel::orderby('name','asc')->get();
        $peserta = SPPDModel::join('employees','employees.id','=','sppd.pegawai_id')->where('spd_id',$jaldin->id)->get();


        $group_golongan = SPPDModel::selectRaw('sppd.spd_id,employees.kode_gol')
                        ->join('employees','employees.id','=','sppd.pegawai_id')
                        ->where('sppd.spd_id',$jaldin->id)
                        ->groupby('employees.kode_gol','sppd.spd_id')
                        ->orderby('employees.kode_gol','asc')
                        ->get();
        // dd($group_golongan);
        if ($request->ajax()) {
            return datatables()->of($jaldin)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots fs-5"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                              <a class="dropdown-item d-flex align-items-center text-primary" id="' . $data->id . '" href="/adminpanel/perjalanan_dinas/'.$data->type_perjalanan.'/'.$data->id.'/edit"><i class="fs-4 ti ti-edit"></i>Edit</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center text-danger" id="' . $data->id . '" href="javascript:void(0)" onclick="deleteData(`' . $data->id . '`)"><i class="fs-4 ti ti-trash"></i>Delete</a>
                            </li>
                          </ul>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kepegawaian.dinas.checklist_biaya_domestik',compact('jaldin','mak','tujuan','mata_anggaran','daerah_tujuan','pejabat_kpa','kpa_id','pejabat','pejabat_id','employees','peserta','group_golongan'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation_rules = Validator::make(
            $request->all(),
            [
                'nomor_surat' => 'required|unique:spb,nomor',
                'TxtMAK' => 'required',
                'tujuan_perjalanan' => 'required',
                'txtDaerah_Tujuan' => 'required',
                'tgl_berangkat' => 'required',
                'tgl_kembali' => 'required',
                'TxtTransportasi' => 'required',
                'tgl_ttd' => 'required',
                'tgl_kuitansi' => 'required',
                'TxtKPA' => 'required',
                'txtPejabatDept' => 'required',
                'nama_peserta' => 'required',
            ],
            [
                'nomor_surat.required' => 'Nomor Surat wajib diisi',
                'nomor_surat.unique' => 'Nomor Surat Sudah Terdata',
                'TxtMAK.required' => 'MAK wajib diisi',
                'tujuan_perjalanan.required' => 'Tujuan Perjalanan wajib diisi',
                'txtDaerah_Tujuan.required' => 'Daerah Tujuan wajib diisi',
                'tgl_berangkat.required' => 'Tanggal Berangkat wajib diisi',
                'tgl_kembali.required' => 'Tanggal Kembali wajib diisi',
                'TxtTransportasi.required' => 'Transportasi wajib diisi',
                'tgl_ttd.required' => 'Tanggal TTD wajib diisi',
                'tgl_kuitansi.required' => 'Tanggal Kuitansi wajib diisi',
                'TxtKPA.required' => 'Nama Pejabat KPA wajib diisi',
                'txtPejabatDept.required' => 'Nama Pejabat wajib diisi',
                'nama_peserta.required' => 'Nama Peserta wajib diisi',
            ]
        );
        if (!$validation_rules->passes()) {
            return response()->json(['status' => 0, 'error' => $validation_rules->errors()->toArray()]);
        }

        $jaldin = PerjalananDinasModel::create(
            [
                'nomor' => $request->nomor_surat,
                'dasarpelaksanaan' => $request->tujuan_perjalanan,
                'tujuan' => $request->txtDaerah_Tujuan,
                'transportasi' => $request->TxtTransportasi,
                'tglberangkat' => $request->tgl_berangkat,
                'tglkembali' => $request->tgl_kembali,
                'kpa_id' => $request->TxtKPA,
                'kasubdit_id' => $request->txtPejabatDept,
                'mak' => $request->TxtMAK,
                'tglttd' => $request->tgl_ttd,
                'tglkuitansi' => $request->tgl_kuitansi,
                'keterangan' => $request->keterangan,
                'type_perjalanan' => $request->type_perjalanan,
            ]
        );
        $thisJaldin = PerjalananDinasModel::findorFail($jaldin->id);
        $ppk_id = PejabatModel::where('jabatan','=','PPK')->first();
        $peserta = $request->nama_peserta;
        $insertData = [];
        foreach($peserta as $data)
        {
            SPPDModel::create([
                'spd_id' => $thisJaldin->id,
                'ppk_id' => $ppk_id->id_name,
                'pegawai_id' => $data,
            ]);
        }

        return response()->json($jaldin);

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
        // dd($id);
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
