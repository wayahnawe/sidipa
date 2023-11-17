<div class="mb-3 mt-3 form-group">
    <label for="name">Nama Pegawai
        <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="text" name="name" id="name" class="form-control" maxlength="100" placeholder="Nama Lengkap"
            autofocus autocomplete="new-password">
        <span class="text-danger error-text name-error"></span>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nip">Nomor Induk Pegawai
                <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="nip" id="nip" class="form-control" maxlength="30"
                    placeholder="Contoh: 1234567890"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <span class="text-danger error-text nip-error"></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="golongan">Golongan
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="golongan" id="golongan">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    @foreach ($golongan as $data)
                        <option value="{{ $data->golongan }}">{{ $data->golongan }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text golongan-error"></span>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="jabatan">Jabatan</label>
            <div class="controls">
                <input type="text" name="jabatan" id="jabatan" class="form-control" maxlength="50"
                    placeholder="Contoh: Staff TU">
            </div>
        </div>
        <div class="col-md-6">
            <label for="subdit">Subdit</label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="subdit" id="subdit">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    @foreach ($subdit as $data)
                        <option value="{{ $data->nama_subdit }}">{{ $data->nama_subdit }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eselon">Eselon</label>
            <div class="controls">
                <input type="text" name="eselon" id="eselon" class="form-control" maxlength="10"
                    placeholder="Contoh: I,II,III">
            </div>
        </div>
        <div class="col-md-6" style="padding:1rem;margin-top:10px">
            <div class="controls">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_pejabat" id="is_pejabat">
                    <label class="form-check-label" for="ispejabat">Pejabat</label>
                </div>
                <input type="text" name="ispejabat" id="ispejabat" hidden>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="DataGapok">Gaji Pokok</label>
            <div class="input-group mb-3">
                <span class="input-group-text">IDR</span>
                <input type="text" name="DataGapok" id="DataGapok"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="20"
                    class="form-control" aria-label="" placeholder="Contoh: 1,000,000">
                <span class="input-group-text">.00</span>
                <input type="text" name="gapok" id="gapok" class="form-control" aria-label="" hidden>
            </div>
        </div>
        <div class="col-md-6">
            <label for="status">Status
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    <option value="0">PNS</option>
                    <option value="1">CPNS</option>
                    <option value="2">Honorer</option>
                    <option value="3">Kontrak</option>
                </select>
                <span class="text-danger error-text status-error"></span>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <div class="controls">
                <div class="input-group border rounded-1">
                    <input type="email" class="form-control border-0" name="email" id="email" placeholder="Contoh user@domain.com">
                    <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">@example.com</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="mb-3 mt-3 form-group">
    <label for="mustcheck" class="text-danger">*
        <span class="text-danger" name="mustcheck" id="mustcheck">Wajib Diisi</span>
    </label>
</div> --}}
