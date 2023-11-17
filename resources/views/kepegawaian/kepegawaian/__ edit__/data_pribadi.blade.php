<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Tempat Lahir</label>
            <div class="controls">
                <input type="text" name="tlahir" id="tlahir" class="form-control" maxlength="100"
                    placeholder="Contoh: Jakarta" value="{{ $employees->tlahir }}">
            </div>
        </div>
        <div class="col-md-6">
            <label>Tanggal Lahir</label>
            <div class="controls">
                <input type="date" name="ttl" id="ttl" class="form-control"
                    value="{{ Carbon\Carbon::parse($employees->ttl)->isoFormat('dd/mm/yyyy') }}">
                <span class="text-danger error-text ttl-error"></span>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Jenis Kelamin</label>
            <div class="controls">
                <div class="row py-2">
                    <div class="col-md-8 col-xl-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input danger" type="radio" name="jkelamin"
                                id="jkelamin" value="Laki-laki"
                                {{ $employees->jkelamain == 'Laki-laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="danger-radio">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input danger" type="radio" name="jkelamin"
                                id="jkelamin" value="Perempuan"
                                {{ $employees->jkelamain == 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="danger2-radio">Perempuan</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label>Agama</label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="agama" id="agama"
                    value="{{ $employees->agama }}">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    <option value="0" {{ $employees->agama == '0' ? 'selected' : '' }}>Islam</option>
                    <option value="1" {{ $employees->agama == '1' ? 'selected' : '' }}>Kristen Protesan</option>
                    <option value="2" {{ $employees->agama == '2' ? 'selected' : '' }}>Kristen Khatolik</option>
                    <option value="3" {{ $employees->agama == '3' ? 'selected' : '' }}>Hindu</option>
                    <option value="4" {{ $employees->agama == '4' ? 'selected' : '' }}>Buddha</option>
                    <option value="5" {{ $employees->agama == '5' ? 'selected' : '' }}>Khonghucu</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Status Perkawinan</label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="status_kawin" id="status_kawin"
                    value="{{ $employees->status_kawin }}">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    <option value="0" {{ $employees->status_kawin == '0' ? 'selected' : '' }}>Belum Menikah
                    </option>
                    <option value="1" {{ $employees->status_kawin == '1' ? 'selected' : '' }}>Menikah</option>
                    <option value="2" {{ $employees->status_kawin == '2' ? 'selected' : '' }}>Duda</option>
                    <option value="3" {{ $employees->status_kawin == '3' ? 'selected' : '' }}>Janda</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <label>Alamat</label>
    <div class="controls">
        <input type="text" name="alamat" id="alamat" class="form-control" maxlength="100"
            placeholder="Contoh: Perumahan Permai Lestari, Jl. Raya Cileduk RT 001 RW 010"
            value="{{ $employees->alamat }}">
    </div>
</div>
<div class="mb-3 mt-3 form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Kelurahan</label>
                <div class="controls">
                    <input type="text" name="kelurahan" id="kelurahan" class="form-control" maxlength="100"
                        placeholder="Contoh: Gaga" value="{{ $employees->kelurahan }}">
                </div>
            </div>
            <div class="col-md-6">
                <label>Kecamatan</label>
                <div class="controls">
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" maxlength="100"
                        placeholder="Contoh: Larangan Selatan" value="{{ $employees->kecamatan }}">
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 mt-3 form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Kota</label>
                <div class="controls">
                    <input type="text" name="kota" id="kota" class="form-control" maxlength="100"
                        placeholder="Contoh: Tangerang" value="{{ $employees->kota }}"">
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-4">
                    <label>Kode Pos</label>
                    <div class="controls">
                        <input type="text" name="kodepos" id="kodepos" class="form-control"
                            maxlength="5"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            placeholder="Contoh: 12345" value="{{ $employees->kodepos }}">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="mb-3 mt-3 form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Provinsi</label>
                <div class="controls">
                    <select class="form-select" aria-label="Default select example" name="provinsi"
                        id="provinsi">
                        <option value="" disabled selected hidden>Pilih Salah Satu</option>
                        {{-- <option value="0">Belum Menikah</option>
                        <option value="1">Menikah</option>
                        <option value="2">Duda</option>
                        <option value="2">Janda</option> --}}
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 mt-3 form-group">
        <div class="row">
            <div class="col-md-6">
                <label>No. Telp/HP</label>
                <div class="controls">
                    <input type="text" name="notelp" id="notelp" class="form-control" maxlength="20"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="Contoh: O818XXXXXXXX" value="{{$employees->notelp}}">
                </div>
            </div>
            <div class="col-md-6">
                <label>ID Telegram</label>
                <div class="controls">
                    <input type="text" name="telegram" id="telegram" class="form-control"
                        placeholder="@telegram_bot" value="{{$employees->telegram}}">
                </div>
            </div>
        </div>
    </div>
