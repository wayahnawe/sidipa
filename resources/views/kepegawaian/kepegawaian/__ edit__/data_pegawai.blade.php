<div class="mb-3 mt-3 form-group">
    <label>Nama Pegawai
        <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="text" name="name" id="name" class="form-control" value="{{ $employees->name }}"maxlength="100"
            placeholder="Nama Lengkap" autofocus autocomplete="new-password">
        <span class="text-danger error-text name-error"></span>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nomor Induk Pegawai
                <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="nip" id="nip" class="form-control" maxlength="30"
                    placeholder="Contoh: 1234567890"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                    value="{{ $employees->nip }}">
                <span class="text-danger error-text nip-error"></span>
            </div>
        </div>
        <div class="col-md-6">
            <label>Golongan
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="golongan" id="golongan">
                    <option value="" disabled selected hidden>{{ $employees->golongan }}</option>
                    @foreach ($golongan as $data)
                        <option value="{{ $data->golongan }}"
                            {{ $employees->golongan == $data->golongan ? 'selected' : '' }}>{{ $data->golongan }}
                        </option>
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
            <label>Jabatan</label>
            <div class="controls">
                <input type="text" name="jabatan" id="jabatan" class="form-control" maxlength="50"
                    value="{{ $employees->jabatan }}" placeholder="Contoh: Staff TU">
            </div>
        </div>
        <div class="col-md-6">
            <label>Subdit</label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="subdit" id="subdit">
                    <option value="" disabled hidden>{{ $employees->subdit }}</option>
                    @foreach ($subdit as $data)
                        <option value="{{ $data->nama_subdit }}"
                            {{ $employees->subdit == $data->nama_subdit ? 'selected' : '' }}>{{ $data->nama_subdit }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Eselon</label>
            <div class="controls">
                <input type="text" name="eselon" id="eselon" value="{{ $employees->eselon }}"
                    class="form-control" maxlength="10" placeholder="Contoh: I,II,III">
            </div>
        </div>
        <div class="col-md-6" style="padding:1rem;margin-top:10px">
            <div class="controls">
                <div class="form-check">
                    <input type="checkbox" value="{{ $employees->ispejabat }}" name="is_pejabat" id="is_pejabat"
                        {{ $employees->ispejabat == 'true' ? 'checked' : '' }} class="form-check-input">
                    <label class="form-check-label" for="customCheck1">Pejabat</label>
                </div>
            </div>
            <input type="text" name="ispejabat" id="ispejabat" hidden>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Gaji Pokok</label>
            <div class="input-group mb-3">
                <span class="input-group-text">IDR</span>
                <input type="text" name="DataGapok" id="DataGapok"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="20"
                    class="form-control" aria-label="" value="{{ number_format($employees->gapok) }}">
                <span class="input-group-text">.00</span>
                <input type="text" name="gapok" id="gapok" class="form-control" aria-label="" hidden>
            </div>
        </div>
        <div class="col-md-6">
            <label>Status
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="form-select" aria-label="Default select example" name="status" id="status"
                    value="{{ $employees->status }}">
                    <option value="" disabled selected hidden>Pilih Salah Satu</option>
                    <option value="0" {{ $employees->status == '0' ? 'selected' : '' }}>PNS</option>
                    <option value="1" {{ $employees->status == '1' ? 'selected' : '' }}>CPNS</option>
                    <option value="2" {{ $employees->status == '2' ? 'selected' : '' }}>Honorer</option>
                    <option value="3" {{ $employees->status == '3' ? 'selected' : '' }}>Kontrak</option>
                </select>
                <span class="text-danger error-text status-error"></span>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Email</label>
            <div class="controls">
                <div class="input-group border rounded-1">
                    <input type="email" class="form-control border-0" name="email" id="email" placeholder="Contoh user@domain.com"
                        value="{{ $employees->email }}">
                    <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">@example.com</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 form-group">
    <label for="" class="text-danger">*
        <span class="text-danger">Wajib Diisi</span>
    </label>
</div>
