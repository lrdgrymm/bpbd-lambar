@extends('layouts.admin')
@section('title', 'Tambah Item Galeri')
@section('content')
    <h1>Tambah Item Galeri Baru</h1>
    <hr style="margin: 1rem 0;">

    @if ($errors->any())
        <div class="alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group"><label>Judul / Caption</label><input type="text" name="judul" value="{{ old('judul') }}" required></div>
        <div class="form-group"><label>Tipe Media</label><select name="tipe" id="tipe-select"><option value="foto">Foto</option><option value="video">Video</option></select></div>
        
        <div class="form-group">
            <label>Sumber Media</label>
            <div>
                <input type="radio" id="sumber_upload" name="sumber_tipe" value="upload" checked> <label for="sumber_upload">Upload dari Komputer</label>
                <input type="radio" id="sumber_link" name="sumber_tipe" value="link" style="margin-left: 1rem;"> <label for="sumber_link">Gunakan Link Eksternal</label>
            </div>
        </div>
        
        <div id="input-upload" class="form-group">
            <label id="label-file-upload">Pilih File Foto (Maks 5MB)</label>
            <input type="file" name="file_upload" id="file-input-accept">
        </div>
        
        <div id="input-link" class="form-group" style="display:none;">
            <label id="label-link-url">Tempelkan Link</label>
            <input type="url" name="link_url" value="{{ old('link_url') }}" placeholder="https://...">
        </div>

        <div class="form-group"><label>Keterangan (Opsional)</label><textarea name="keterangan" rows="3">{{ old('keterangan') }}</textarea></div>
        <button type="submit" class="news-button">Simpan</button>
    </form>
@endsection

@push('scripts')
<script>
    const tipeSelect = document.getElementById('tipe-select');
    const radioUpload = document.getElementById('sumber_upload');
    const radioLink = document.getElementById('sumber_link');
    const inputUpload = document.getElementById('input-upload');
    const inputLink = document.getElementById('input-link');
    const fileInput = document.getElementById('file-input-accept');

    function updateForm() {
        const tipe = tipeSelect.value;
        const sumber = radioLink.checked ? 'link' : 'upload';

        // Perbarui atribut 'accept' untuk membatasi tipe file
        if (tipe === 'foto') {
            fileInput.accept = 'image/jpeg,image/png,image/gif'; // Hanya gambar
        } else {
            fileInput.accept = 'video/mp4,video/quicktime,video/x-msvideo'; // Hanya video
        }

        // Tampilkan/sembunyikan input yang sesuai
        if (sumber === 'link') {
            inputLink.style.display = 'block';
            inputUpload.style.display = 'none';
        } else {
            inputLink.style.display = 'none';
            inputUpload.style.display = 'block';
        }
    }
    
    tipeSelect.addEventListener('change', updateForm);
    radioUpload.addEventListener('change', updateForm);
    radioLink.addEventListener('change', updateForm);

    updateForm();
</script>
@endpush