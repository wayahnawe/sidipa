<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label for="name">Nomor Surat
                <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" maxlength="100"
                    placeholder="Contoh: ST.XXX/DKPPU/XXXX/XXXX" autofocus autocomplete="off"
                    value="{{ $jaldin->nomor }}" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label for="golongan">MAK
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="TxtMAK" id="TxtMAK"
                    value="{{ $mak->kode_anggaran }}">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($mata_anggaran as $data)
                        <option value="{{ $data->id }}" {{ $mak->id == $data->id ? 'selected' : '' }}>
                            {{ $data->kode_anggaran }}</option>
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
            <label for="jabatan">Tujuan Perjalanan</label>
            <span class="text-danger">Maksimal 1000 Karakter *)</span>
        </div>
        <div class="controls">
            <textarea name="tujuan_perjalanan" id="tujuan_perjalanan" cols="30" rows="5" class="form-control"
                maxlength="1000" placeholder="Contoh: Tujuan Pejalanan" autocomplete="false">{{ $jaldin->dasarpelaksanaan }}</textarea>
            <span class="text-danger error-text tujuan_perjalanan-error"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label for="golongan">Daerah Tujuan
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="txtDaerah_Tujuan"
                    value="{{ $tujuan->nama }}" id="txtDaerah_Tujuan">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($daerah_tujuan as $data)
                        <option value="{{ $data->id }}" {{ $tujuan->id == $data->id ? 'selected' : '' }}>
                            {{ $data->nama }}</option>
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
                        autocomplete="off" value="{{ $jaldin->tglberangkat }}">
                    <span class="text-danger error-text tgl_berangkat-error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3 form-group">
                    <label>Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" autocomplete="off"
                        value="{{ $jaldin->tglkembali }}">
                    <span class="text-danger error-text tgl_kembali-error"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label for="golongan">Transportasi
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="TxtTransportasi"
                    id="TxtTransportasi" value="{{ $jaldin->transportasi }}">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    <option value="Transportasi Udara"
                        {{ $jaldin->transportasi == 'Transportasi Udara' ? 'selected' : '' }}>Transportasi Udara
                    </option>
                    <option value="Transportasi Darat"
                        {{ $jaldin->transportasi == 'Transportasi Darat' ? 'selected' : '' }}>Transportasi Darat
                    </option>
                    <option value="Transportasi Laut"
                        {{ $jaldin->transportasi == 'Transportasi Laut' ? 'selected' : '' }}>Transportasi Laut</option>
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
                    <input type="date" name="tgl_ttd" id="tgl_ttd" class="form-control" autocomplete="off"
                        value="{{ $jaldin->tglttd }}">
                    <span class="text-danger error-text tgl_ttd-error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3 form-group">
                    <label>Tanggal Kuitansi</label>
                    <input type="date" name="tgl_kuitansi" id="tgl_kuitansi" class="form-control"
                        autocomplete="off" value="{{ $jaldin->tglkuitansi }}">
                    <span class="text-danger error-text tgl_kuitansi-error"></span>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label for="">KPA
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="TxtKPA" id="TxtKPA"
                    value="{{ $kpa_id->name }}">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($pejabat_kpa as $data)
                        <option value="{{ $data->id_name }}" {{ $kpa_id->id == $data->id_name ? 'selected' : '' }}>
                            {{ $data->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text TxtKPA-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 mt-3 form-group">
            <label for="golongan">Kabag/Kasubdit
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="txtPejabatDept"
                    id="txtPejabatDept" value="{{ $pejabat_id->name }}">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($pejabat as $data)
                        <option value="{{ $data->id_name }}"
                            {{ $pejabat_id->id == $data->id_name ? 'selected' : '' }}>{{ $data->name }}</option>
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
        <select class="select2 form-control" style="height: 36px; width: 100%;text-transform: uppercase"
            name="nama_peserta[]" id="nama_peserta" aria-placeholder="Peserta SPD">
            {{-- @foreach ($employees as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach --}}
        </select>
        <span class="text-danger error-text nama_peserta-error"></span>
    </div>
</div>
<div class="row">
    <div class="mb-3 mt-3 form-group">
        <label for="jabatan">Keterangan Lainnya

        </label>
        <div class="controls">
            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" maxlength="1000"
                placeholder="Contoh: Keterangan Lainnya">{{ $jaldin->keterangan }}</textarea>
            <span class="text-danger">Maksimal 1000 Karakter *)</span>
        </div>
    </div>
</div>
