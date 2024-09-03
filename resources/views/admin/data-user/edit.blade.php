@extends('admin.layouts.main')

@push('title')
    Edit User
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"><strong>Page</strong> &raquo; Edit User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Data User</h4>

                        <!-- Alert untuk pesan error -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('data-user.update', $dataUser->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama User</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Nama Wali" value="{{ old('name', $dataUser->name) }}">
                                    </div>
                                </div> <!-- end col -->

                                <!-- Kolom Kanan -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control"
                                            placeholder="email" value="{{ old('email', $dataUser->email) }}" readonly>
                                    </div>
                                </div> <!-- end col -->

                                <!-- Kolom Kanan -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="role" name="role">
                                            <option value="admin"
                                                {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="kepsek"
                                                {{ old('role', $dataUser->role) == 'kepsek' ? 'selected' : '' }}>
                                                Kepsek</option>
                                            <option value="siswa"
                                                {{ old('role', $dataUser->role) == 'siswa' ? 'selected' : '' }}>
                                                Siswa</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container-fluid -->
@endsection
