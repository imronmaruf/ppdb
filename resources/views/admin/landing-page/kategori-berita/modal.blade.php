<!-- Modal -->
<div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Kesalahan - </strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kategori-berita.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" id="slug" name="slug" disabled
                            class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->



<!-- Modal Edit -->
@foreach ($dataKategoriBerita as $data)
    <div class="modal fade" id="modalEdit{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalEditLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h5 class="modal-title" id="modalEditLabel{{ $data->id }}">Edit Kategori Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div> <!-- end modal header -->

                <form action="{{ route('kategori-berita.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="name{{ $data->id }}" class="form-label">Nama Kategori</label>
                            <input type="text" id="name{{ $data->id }}" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $data->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="slug{{ $data->id }}" class="form-label">Slug</label>
                            <input type="text" id="slug{{ $data->id }}" name="slug"
                                class="form-control @error('slug') is-invalid @enderror"
                                value="{{ old('slug', $data->slug) }}" disabled> <!-- Value dengan data lama -->
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div> <!-- end modal footer -->
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->
@endforeach


<script>
    // Untuk modal tambah
    document.getElementById('name').addEventListener('input', function() {
        let nameInput = this.value;
        let slugInput = document.getElementById('slug');

        // Mengubah nama menjadi slug (huruf kecil, spasi menjadi dash)
        let slug = nameInput.toLowerCase()
            .replace(/[^a-z0-9\s]/g, '') // Hapus karakter spesial
            .replace(/\s+/g, '-') // Ganti spasi dengan '-'
            .trim();

        // Set value dari input slug dan disable
        slugInput.value = slug;
        slugInput.setAttribute('disabled', true);
    });

    // Untuk setiap modal edit berdasarkan ID unik
    @foreach ($dataKategoriBerita as $data)
        document.getElementById('name{{ $data->id }}').addEventListener('input', function() {
            let nameInput = this.value;
            let slugInput = document.getElementById('slug{{ $data->id }}');

            // Mengubah nama menjadi slug (huruf kecil, spasi menjadi dash)
            let slug = nameInput.toLowerCase()
                .replace(/[^a-z0-9\s]/g, '') // Hapus karakter spesial
                .replace(/\s+/g, '-') // Ganti spasi dengan '-'
                .trim();

            // Set value dari input slug dan disable
            slugInput.value = slug;
            slugInput.setAttribute('disabled', true);
        });
    @endforeach
</script>
