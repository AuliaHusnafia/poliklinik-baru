<x-layouts.app title="Tambah Obat">

    {{-- Header --}}
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
        <a href="{{ route('admin.obat.index') }}" 
           style="display:flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:8px; background:#f1f5f9; color:#475569; text-decoration:none;">
            <i class="fas fa-arrow-left"></i>
        </a>

        <h2 style="font-size:1.5rem; font-weight:700; color:#1e293b; margin:0;">
            Tambah Obat
        </h2>
    </div>

    {{-- Card --}}
    <div class="card">
        <form action="{{ route('admin.obat.store') }}" method="POST">
            @csrf

            {{-- Nama + Kemasan --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">

                {{-- Nama Obat --}}
                <div>
                    <label style="font-weight:600;">Nama Obat *</label>
                    <input type="text" name="nama_obat" value="{{ old('nama_obat') }}"
                        placeholder="Masukkan nama obat..."
                        style="width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px; margin-top:5px;"
                        required>
                    @error('nama_obat')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Kemasan --}}
                <div>
                    <label style="font-weight:600;">Kemasan</label>
                    <input type="text" name="kemasan" value="{{ old('kemasan') }}"
                        placeholder="Contoh: Strip, Botol, Tube"
                        style="width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px; margin-top:5px;">
                    @error('kemasan')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            {{-- Harga --}}
            <div style="margin-bottom:25px;">
                <label style="font-weight:600;">Harga *</label>
                <div style="display:flex; align-items:center; border:1px solid #e5e7eb; border-radius:8px; padding:8px; margin-top:5px;">
                    <span style="margin-right:5px;">Rp</span>
                    <input type="number" name="harga" value="{{ old('harga') }}" min="0"
                        placeholder="0"
                        style="border:none; outline:none; width:100%;" required>
                </div>
                @error('harga')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Button --}}
            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>

                <a href="{{ route('admin.obat.index') }}" 
                   style="padding:10px 16px; background:#f1f5f9; border-radius:8px; text-decoration:none; color:#475569;">
                    Batal
                </a>
            </div>

        </form>
    </div>

</x-layouts.app>