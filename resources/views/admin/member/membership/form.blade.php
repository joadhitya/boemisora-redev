<div class="card-body p-0">
    <form id="example-form" action="#">
        <div id="section-sign" class="row">
            <div class="col-md-3">
                <div id='card-form-1' class="card shadow text-white bg-primary active">
                    <div class="card-body p-2">
                        <div>1. Profile Anggota</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id='card-form-2' class="card shadow bg-light">
                    <div class="card-body p-2">
                        <div>2. Identitas Anggota</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id='card-form-3' class="card shadow bg-light">
                    <div class="card-body p-2">
                        <div>3. Komunitas Anggota</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id='card-form-3' class="card shadow bg-light">
                    <div class="card-body p-2">
                        <div>Review Member PERBAKIN</div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div id='form-1' class="p-2">
            <div class="row">
                <div class="col-md-4"> 
                    <label for="fileUpload">Upload Files:</label>
                    <input type="file" id="fileUpload" name="fileUpload[]" multiple>
                </div>
                <div class="col-md-8">
                    @php
                        $profile = [
                            ['id' => 'fullname', 'name' => 'fullname', 'title' => 'Nama Lengkap'],
                            ['id' => 'nickname', 'name' => 'nickname', 'title' => 'Nama Panggilan'],
                            ['id' => 'nik', 'name' => 'nik', 'title' => 'NIK (Nomor Identitas Kependudukan)'],
                            ['id' => 'kta', 'name' => 'kta', 'title' => 'KTA (Kartu Tanda Anggota)'],
                        ];
                    @endphp
                    @foreach ($profile as $pr)
                        <label>{{ $pr['title'] }}: </label>
                        <div class="form-group">
                            <input type="text" id="{{ $pr['id'] }}" name="{{ $pr['name'] }}"
                                class="form-control form-control-sm bg-transparent" value="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id='form-2' class="d-none">
            <div class="row">
                <div class="col-md-6">
                    <label>Nomor Kontak: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Tempat Lahir: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Tanggal Lahir: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Jenis Kelamin: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Agama: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Golongan Darah: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Pekerjaan: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Alamat: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Provinsi: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                    <label>Kecamatan: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Kota: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                    <label>Kode Pos: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
            </div>


        </div>
        <div id='form-3' class="d-none">
            <div class="row">
                <div class="col-md-6">
                    <label>Homebase: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Klub: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Tanggal Join: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Akhir: </label>
                    <div class="form-group">
                        <input type="text" id="headline" name="headline"
                            class="form-control form-control-sm bg-transparent" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @php
                        $bidangTembak = [
                            ['id' => 'tembak-sasaran', 'name' => 'Tembak Sasaran'],
                            ['id' => 'tembak-reaksi', 'name' => 'Tembak Reaksi'],
                            ['id' => 'berburu', 'name' => 'Berburu'],
                        ];
                    @endphp
                    <label>Bidang Tembak: </label>
                    <div class="row">
                        @foreach ($bidangTembak as $bt)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input"
                                            id="switchBidang{{ $bt['id'] }}">
                                        <label class="custom-control-label"
                                            for="switchBidang{{ $bt['id'] }}">{{ $bt['name'] }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    @php
                        $statusKeanggotaan = [
                            ['id' => 'atlet', 'name' => 'Atlet'],
                            ['id' => 'wasit', 'name' => 'Wasit'],
                            ['id' => 'pelatih', 'name' => 'Pelatih'],
                        ];
                    @endphp
                    <label>Status Keanggotaan: </label>
                    <div class="row">
                        @foreach ($statusKeanggotaan as $sk)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input"
                                            id="switchBidang{{ $sk['id'] }}">
                                        <label class="custom-control-label"
                                            for="switchBidang{{ $sk['id'] }}">{{ $sk['name'] }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id='form-4' class="d-none">
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-sm btn-primary mr-1 float-right text-uppercase"
                    onclick="handleSectionForm('next')"><i class="fe fe-arrow-right"></i> Next</button>
                <button type="button" class="btn btn-sm btn-warning mr-1 float-right text-uppercase"
                    onclick="handleSectionForm('back')"><i class="fe fe-arrow-left"></i> Back</button>
            </div>
        </div>
    </form>
</div> <!-- .card-body -->
