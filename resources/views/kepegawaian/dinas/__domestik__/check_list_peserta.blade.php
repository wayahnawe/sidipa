<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 form-group">
            <label for="golongan">Tingkat Golongan Peserta
                <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="select2 form-control" style="width: 100%; height: 36px" name="txtGolongan" id="txtGolongan">
                    <option value="" disabled hidden selected>Pilih Salah Satu</option>
                    @foreach ($group_golongan as $data)
                        <option value="{{ $data->kode_gol }}">
                            {{ $data->kode_gol }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text txtGolongan-error"></span>
            </div>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-md-12">
        <div class="mb-3 mt-3 form-group">
            <label>Nama Peserta</label>
            <div class="controls">
                <select class="select2 form-control" style="height: 36px; width: 100%;text-transform: uppercase"
                    name="txtnama_peserta[]" id="txtnama_peserta" aria-placeholder="Peserta SPD" disabled>
                </select>
            </div>
        </div>
    </div>
</div>
