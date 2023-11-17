<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="tlahir">Tempat Lahir</label>
            <div class="controls">
                <input type="text" name="tlahir" id="tlahir" class="form-control" maxlength="100"
                    placeholder="Contoh: Jakarta">
            </div>
        </div>
        <div class="col-md-6">
            <label for="ttl">Tanggal Lahir</label>
            <div class="controls">
                <input type="date" name="ttl" id="ttl" class="form-control">
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
                                id="Laki-laki" value="Laki-laki">
                            <label class="form-check-label" for="Laki-laki">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input danger" type="radio" name="jkelamin"
                                id="Perempuan" value="Perempuan">
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="agama">Agama</label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="agama" id="agama">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    <option value="0">Islam</option>
                    <option value="1">Kristen Protesan</option>
                    <option value="2">Kristen Khatolik</option>
                    <option value="3">Hindu</option>
                    <option value="4">Buddha</option>
                    <option value="5">Khonghucu</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="status_kawin">Status Perkawinan</label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="status_kawin" id="status_kawin">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    <option value="0">Belum Menikah</option>
                    <option value="1">Menikah</option>
                    <option value="2">Duda</option>
                    <option value="2">Janda</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <label for="alamat">Alamat</label>
    <div class="controls">
        <input type="text" name="alamat" id="alamat" class="form-control" maxlength="100"
            placeholder="Contoh: Perumahan Permai Lestari, Jl. Raya Cileduk RT 001 RW 010">
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="kelurahan">Kelurahan</label>
            <div class="controls">
                <input type="text" name="kelurahan" id="kelurahan" class="form-control" maxlength="100"
                    placeholder="Contoh: Gaga">
            </div>
        </div>
        <div class="col-md-6">
            <label for="kecamatan">Kecamatan</label>
            <div class="controls">
                <input type="text" name="kecamatan" id="kecamatan" class="form-control" maxlength="100"
                    placeholder="Contoh: Larangan Selatan">
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="kota">Kota</label>
            <div class="controls">
                <input type="text" name="kota" id="kota" class="form-control" maxlength="100"
                    placeholder="Contoh: Tangerang">
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-4">
                <label for="kodepos">Kode Pos</label>
                <div class="controls">
                    <input type="text" name="kodepos" id="kodepos" class="form-control" maxlength="5"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="Contoh: 12345">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="provinsi">Provinsi</label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="provinsi" id="provinsi">
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
            <label for="notelp">No. Telp/HP</label>
            <div class="controls">
                <input type="text" name="notelp" id="notelp" class="form-control" maxlength="20" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="Contoh: O818XXXXXXXX">
            </div>
        </div>
        <div class="col-md-6">
            <label for="telegram">ID Telegram</label>
            <div class="controls">
                <input type="text" name="telegram" id="telegram" class="form-control" placeholder="@telegram_bot">
            </div>
        </div>
    </div>
</div>
