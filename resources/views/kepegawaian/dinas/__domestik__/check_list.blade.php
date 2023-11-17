<div class="mb-3">
    <div class="d-flex justify-content-end">
        {{-- <div class="col-lg-2">
            <button type="button" class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center customizer-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="ti ti-plus fs-4 me-2"></i>
                Tambah
            </button>
        </div> --}}
        <div class="col-lg-2">
        <button id="btnCanvas" class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="ti ti-plus fs-4 me-2"></i>
                Tambah
                      </button>
        </div>
    </div>
</div>
{{-- <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
  </button> --}}
{{-- <div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>Nomor Surat
                <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" maxlength="100"
                    placeholder="Contoh: ST.XXX/DKPPU/XXXX/XXXX" autofocus autocomplete="off">
                <span class="text-danger error-text nomor_surat-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>MAK
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="TxtMAK" id="TxtMAK">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($mata_anggaran as $data)
                        <option value="{{ $data->id }}">{{ $data->kode_anggaran }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text TxtMAK-error"></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="mb-3 mt-3 form-group">
        <div class="label-class d-flex" style="justify-content: space-between">
            <label>Tujuan Perjalanan</label>
            <span class="text-danger">Maksimal 1000 Karakter *)</span>
        </div>
        <div class="controls">
            <textarea name="tujuan_perjalanan" id="tujuan_perjalanan" cols="30" rows="5" class="form-control"
                maxlength="1000" placeholder="Contoh: Tujuan Pejalanan"></textarea>
            <span class="text-danger error-text tujuan_perjalanan-error"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>Daerah Tujuan
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="txtDaerah_Tujuan"
                    id="txtDaerah_Tujuan">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($daerah_tujuan as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text txtDaerah_Tujuan-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3 form-group">
                    <label>Berangkat</label>
                    <input type="date" name="tgl_berangkat" id="tgl_berangkat" class="form-control"
                        autocomplete="off">
                    <span class="text-danger error-text tgl_berangkat-error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3 form-group">
                    <label>Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" autocomplete="off">
                    <span class="text-danger error-text tgl_kembali-error"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>Transportasi
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="TxtTransportasi"
                    id="TxtTransportasi">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    <option value="Transportasi Udara">Transportasi Udara</option>
                    <option value="Transportasi Darat">Transportasi Darat</option>
                    <option value="Transportasi Laut">Transportasi Laut</option>
                </select>
                <span class="text-danger error-text TxtTransportasi-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3 form-group">
                    <label>Tanggal TTD</label>
                    <input type="date" name="tgl_ttd" id="tgl_ttd" class="form-control" autocomplete="off">
                    <span class="text-danger error-text tgl_ttd-error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3 form-group">
                    <label>Tanggal Kuitansi</label>
                    <input type="date" name="tgl_kuitansi" id="tgl_kuitansi" class="form-control"
                        autocomplete="off">
                    <span class="text-danger error-text tgl_kuitansi-error"></span>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>KPA
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="TxtKPA"
                    id="TxtKPA">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($pejabat_kpa as $data)
                        <option value="{{ $data->id_name }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text TxtKPA-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>Kabag/Kasubdit
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="txtPejabatDept"
                    id="txtPejabatDept">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($pejabat as $data)
                        <option value="{{ $data->id_name }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text txtPejabatDept-error"></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <label>Peserta SPD</label>
    <div class="controls">
        <select class="select2 form-control" multiple="multiple"
            style="height: 36px; width: 100%;text-transform: uppercase" name="nama_peserta[]" id="nama_peserta"
            aria-placeholder="Peserta SPD">
            @foreach ($employees as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
        </select>
        <span class="text-danger error-text nama_peserta-error"></span>
    </div>
</div>
<div class="row">
    <div class="mb-3 mt-3 form-group">
        <label>Keterangan Lainnya

        </label>
        <div class="controls">
            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" maxlength="1000"
                placeholder="Contoh: Keterangan Lainnya"></textarea>
            <span class="text-danger">Maksimal 1000 Karakter *)</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>Instasi Tujuan
                <span class="text-danger">*</span></label>
            </label>
            <div class="controls">
                <input type="text" name="txtInstansiTujuan" id="txtInstansiTujuan" class="form-control"
                    maxlength="50" placeholder="Contoh: PT. XXXX " style="text-transform: uppercase">
                <span class="text-danger error-text txtInstansiTujuan-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>Nama
                <span class="text-danger">*</span></label>
            </label>
            <div class="controls">
                <input type="text" name="txtNamaTujuan" id="txtNamaTujuan" class="form-control"
                    maxlength="50" placeholder="Contoh: ACHMAD PRAXXXXX " style="text-transform: uppercase">
                <span class="text-danger error-text txtNamaTujuan-error"></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <div class="label-class d-flex" style="justify-content: space-between">
            <label>NIP</label>
            <span class="text-danger">Bila Instansi Pemerintahan *)</span>
        </div>
            <div class="controls">
                <input type="text" name="txtNIP" id="txtNIP" class="form-control"
                    maxlength="30"
                    placeholder="Contoh: 1234567890"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label>Jabatan
                <span class="text-danger">*</span></label>
            </label>
            <div class="controls">
                <input type="text" name="txtJabatanaTujuan" id="txtJabatanaTujuan" class="form-control"
                    maxlength="50" placeholder="Contoh: BUSINESS DEVELOPMENT" style="text-transform: uppercase">
                <span class="text-danger error-text txtJabatanaTujuan-error"></span>
            </div>
        </div>
    </div>
</div> --}}
