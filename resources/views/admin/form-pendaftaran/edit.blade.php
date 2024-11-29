@extends('admin.layouts.main')

@push('title')
    Dashboard {{ Auth::user()->role ?? '' }}
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"><strong>Page</strong> &raquo; Edit Form Edit Peserta PPDB</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Data Peserta PPDB</h4>
                        <div class="alert alert-success" role="alert">
                            <i class="dripicons-information me-2"></i> Input yang memiliki tanda
                            <strong class="text-danger">*</strong> adalah input yang harus diisi. <br>
                            <i class="dripicons-information me-2"></i><strong class="text-danger">**</strong> Input No.
                            Kartu PKH wajib diisi jika pada status PKH
                            memilih <strong> "Ada"</strong>

                        </div>

                        <!-- Alert untuk pesan error -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Kesalahan - </strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('data-pendaftaran.update', $dataPendaftar->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama Lengkap" value="{{ old('name', $dataPendaftar->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                            id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="laki-laki"
                                                {{ old('jenis_kelamin', $dataPendaftar->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="perempuan"
                                                {{ old('jenis_kelamin', $dataPendaftar->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            placeholder="Tempat Lahir"
                                            value="{{ old('tempat_lahir', $dataPendaftar->tempat_lahir) }}">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                                class="text-danger">*</span></label>
                                        <div id="usia-message" class="text-danger mb-2" style="display: none;"></div>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir', $dataPendaftar->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="kk" class="form-label">Nomor Kartu Keluarga (KK)<span
                                                class="text-danger">*</span></label>
                                        <input type="number" id="kk" name="kk"
                                            class="form-control @error('kk') is-invalid @enderror" placeholder="Nomor KK"
                                            maxlength="20" value="{{ old('kk', $dataPendaftar->kk) }}">
                                        @error('kk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)<span
                                                class="text-danger">*</span></label>
                                        <input type="number" id="nik" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror" placeholder="Nomor NIK"
                                            maxlength="16" value="{{ old('nik', $dataPendaftar->nik) }}">
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="no_akte_kelahiran" class="form-label">Nomor Akte Kelahiran<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="no_akte_kelahiran" name="no_akte_kelahiran"
                                            class="form-control @error('no_akte_kelahiran') is-invalid @enderror"
                                            placeholder="Nomor Akte Kelahiran"
                                            value="{{ old('no_akte_kelahiran', $dataPendaftar->no_akte_kelahiran) }}">
                                        @error('no_akte_kelahiran')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="status_pkh" class="form-label">Status Program Keluarga Harapan
                                            (PKH)<span class="text-danger">*</span></label>
                                        <select class="form-select @error('status_pkh') is-invalid @enderror"
                                            id="status_pkh" name="status_pkh">
                                            <option value="ada"
                                                {{ old('status_pkh', $dataPendaftar->status_pkh) == 'ada' ? 'selected' : '' }}>
                                                Ada
                                            </option>
                                            <option value="tidak"
                                                {{ old('status_pkh', $dataPendaftar->status_pkh) == 'tidak' ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('status_pkh')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="no_pkh" class="form-label">No. Kartu Program Keluarga Harapan
                                            (PKH)<span class="text-danger"> **</span><br>Keterangan : <code>Nomor Wajib
                                                Diisi Jika Status PKH ada, jika tidak boleh kosong</code></label>
                                        <input type="text" id="no_pkh" name="no_pkh"
                                            class="form-control @error('no_pkh') is-invalid @enderror"
                                            placeholder="No kartu PKH"
                                            value="{{ old('no_pkh', $dataPendaftar->no_pkh) }}">
                                        @error('no_pkh')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('agama') is-invalid @enderror" id="agama"
                                            name="agama">
                                            <option value="islam"
                                                {{ old('agama', $dataPendaftar->agama) == 'islam' ? 'selected' : '' }}>
                                                Islam</option>
                                            <option value="katolik"
                                                {{ old('agama', $dataPendaftar->agama) == 'katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="protestan"
                                                {{ old('agama', $dataPendaftar->agama) == 'protestan' ? 'selected' : '' }}>
                                                Protestan</option>
                                            <option value="hindu"
                                                {{ old('agama', $dataPendaftar->agama) == 'hindu' ? 'selected' : '' }}>
                                                Hindu</option>
                                            <option value="buddha"
                                                {{ old('agama', $dataPendaftar->agama) == 'buddha' ? 'selected' : '' }}>
                                                Buddha</option>
                                            <option value="konghucu"
                                                {{ old('agama', $dataPendaftar->agama) == 'konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tinggal_dengan" class="form-label">Tinggal Dengan<span
                                                class="text-danger"> *</span></label>
                                        <input type="text" id="tinggal_dengan" name="tinggal_dengan"
                                            class="form-control @error('tinggal_dengan') is-invalid @enderror"
                                            placeholder="Tinggal Dengan"
                                            value="{{ old('tinggal_dengan', $dataPendaftar->tinggal_dengan) }}">
                                        @error('tinggal_dengan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="no_telp"
                                            class="form-label @error('no_telp') is-invalid @enderror">No.
                                            Handphone Aktif<span class="text-danger"> *</span></label>
                                        <input type="number" id="no_telp" name="no_telp" class="form-control"
                                            placeholder="No Telp" value="{{ old('no_telp', $dataPendaftar->no_telp) }}">
                                        @error('no_telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="anak_ke" class="form-label">Anak Ke<span class="text-danger">
                                                *</span></label>
                                        <input type="text" id="anak_ke" name="anak_ke"
                                            class="form-control @error('anak_ke') is-invalid @enderror"
                                            placeholder="Anak Ke" maxlength="2"
                                            value="{{ old('anak_ke', $dataPendaftar->anak_ke) }}">
                                        @error('anak_ke')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="jml_saudara_kandung" class="form-label">Jumlah Saudara Kandung<span
                                                class="text-danger"> *</span></label>
                                        <input type="number" id="jml_saudara_kandung" name="jml_saudara_kandung"
                                            class="form-control @error('jml_saudara_kandung') is-invalid @enderror"
                                            placeholder="Jumlah Saudara Kandung" maxlength="2"
                                            value="{{ old('jml_saudara_kandung', $dataPendaftar->jml_saudara_kandung) }}">
                                        @error('jml_saudara_kandung')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)<span
                                                class="text-danger"> *</span></label>
                                        <input type="number" id="tinggi_badan" name="tinggi_badan"
                                            class="form-control @error('tinggi_badan') is-invalid @enderror"
                                            placeholder="Tinggi Badan" step="0.1"
                                            value="{{ old('tinggi_badan', $dataPendaftar->tinggi_badan) }}">
                                        @error('tinggi_badan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="berat_badan" class="form-label">Berat Badan (kg)<span
                                                class="text-danger"> *</span></label>
                                        <input type="number" id="berat_badan" name="berat_badan"
                                            class="form-control @error('berat_badan') is-invalid @enderror"
                                            placeholder="Berat Badan" step="0.1"
                                            value="{{ old('berat_badan', $dataPendaftar->berat_badan) }}">
                                        @error('berat_badan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                        <input type="text" id="asal_sekolah" name="asal_sekolah"
                                            class="form-control @error('asal_sekolah') is-invalid @enderror"
                                            placeholder="Asal Sekolah"
                                            value="{{ old('asal_sekolah', $dataPendaftar->asal_sekolah) }}">
                                        @error('asal_sekolah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat<span
                                                class="text-danger">*</span><br>
                                            Contoh : <code>Nama Dusun, Nama Kelurahan, Kecamatan, Kabupaten</code><br>
                                            <strong>Catatan:</strong> Alamat harus berada di Kecamatan Dewantara
                                        </label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="5"
                                            placeholder="Alamat Lengkap">{{ old('alamat', $dataPendaftar->alamat) }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>


                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alamatInput = document.getElementById('alamat');
            const alamatFeedback = document.createElement('div');
            alamatFeedback.className = 'invalid-feedback';
            alamatInput.parentNode.appendChild(alamatFeedback);

            alamatInput.addEventListener('input', function() {
                const alamat = this.value.toLowerCase();
                if (alamat.includes('dewantara')) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    alamatFeedback.style.display = 'none';
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                    alamatFeedback.textContent = 'Alamat harus berada di kecamatan "Dewantara".';
                    alamatFeedback.style.display = 'block';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const statusPkhSelect = document.getElementById('status_pkh');
            const noPkhInput = document.getElementById('no_pkh');
            const tanggalLahirInput = document.getElementById('tanggal_lahir');
            const usiaMessage = document.getElementById('usia-message');
            const form = document.querySelector('form');
            const allInputs = form.querySelectorAll('input, select, textarea');

            function toggleNoPkh() {
                if (statusPkhSelect.value === 'ada') {
                    noPkhInput.disabled = false;
                } else {
                    noPkhInput.disabled = true;
                    noPkhInput.value = '';
                }
            }

            function hitungUsia(tanggalLahir) {
                const today = new Date();
                const birthDate = new Date(tanggalLahir);
                let age = today.getFullYear() - birthDate.getFullYear();
                const m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                const months = (today.getMonth() + 12 * today.getFullYear()) -
                    (birthDate.getMonth() + 12 * birthDate.getFullYear());
                const days = Math.floor((today - birthDate) / (24 * 60 * 60 * 1000));
                return {
                    years: age,
                    months: months % 12,
                    days: days % 30
                };
            }

            function checkAge() {
                const tanggalLahir = tanggalLahirInput.value;
                if (tanggalLahir) {
                    const usia = hitungUsia(tanggalLahir);
                    const message =
                        `Usia calon siswa adalah: ${usia.years} tahun, ${usia.months} bulan, ${usia.days} hari`;
                    usiaMessage.textContent = message;
                    usiaMessage.style.display = 'block';

                    if (usia.years < 7) {
                        allInputs.forEach(input => {
                            if (input !== tanggalLahirInput) {
                                input.disabled = true;
                            }
                        });
                        usiaMessage.innerHTML +=
                            ". Usia harus 7 tahun.<br>Jika umur dibawah 7 Tahun maka status pendaftaran otomatis DITOLAK.";

                    } else {
                        allInputs.forEach(input => {
                            input.disabled = false;
                        });
                        toggleNoPkh(); // Pastikan status No PKH tetap sesuai
                    }
                } else {
                    usiaMessage.style.display = 'none';
                    allInputs.forEach(input => {
                        input.disabled = false;
                    });
                    toggleNoPkh(); // Pastikan status No PKH tetap sesuai
                }
            }

            // Jalankan fungsi ketika halaman pertama kali dimuat
            toggleNoPkh();
            checkAge();

            // Event listener untuk mendeteksi perubahan pada Status PKH
            statusPkhSelect.addEventListener('change', toggleNoPkh);

            // Event listener untuk mendeteksi perubahan pada tanggal lahir
            tanggalLahirInput.addEventListener('change', checkAge);
        });
    </script>
@endpush
