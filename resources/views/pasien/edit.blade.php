<x-layouts.app title="Edit Pasien">

    {{-- Header --}}
    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
        {{-- Perbaikan: Tambahkan 'admin.' pada rute --}}
        <a href="{{ route('admin.pasien.index') }}" 
           style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: #f1f5f9; color: #64748b; text-decoration: none; transition: 0.3s;">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>

        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">
            Edit Pasien
        </h2>
    </div>

    {{-- Form Card --}}
    <div class="card">
        {{-- Perbaikan: Tambahkan 'admin.' pada action dan gunakan method PUT --}}
        <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 20px;">

                {{-- Nama --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        Nama Pasien <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama', $pasien->nama) }}" placeholder="Masukkan nama pasien..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid {{ $errors->has('nama') ? '#ef4444' : '#e2e8f0' }}; outline: none;" required>
                    @error('nama')
                        <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        Email <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', $pasien->email) }}" placeholder="Masukkan email..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid {{ $errors->has('email') ? '#ef4444' : '#e2e8f0' }}; outline: none;" required>
                    @error('email')
                        <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No KTP --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        No. KTP <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="no_ktp" value="{{ old('no_ktp', $pasien->no_ktp) }}" placeholder="Masukkan No. KTP..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid {{ $errors->has('no_ktp') ? '#ef4444' : '#e2e8f0' }}; outline: none;" required>
                    @error('no_ktp')
                        <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        No. HP <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}" placeholder="Masukkan No. HP..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid {{ $errors->has('no_hp') ? '#ef4444' : '#e2e8f0' }}; outline: none;" required>
                    @error('no_hp')
                        <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Alamat --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                    Alamat <span style="color: #ef4444;">*</span>
                </label>
                <textarea name="alamat" rows="3" placeholder="Masukkan alamat..." 
                          style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid {{ $errors->has('alamat') ? '#ef4444' : '#e2e8f0' }}; outline: none;" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                @error('alamat')
                    <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div style="margin-bottom: 30px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                    Password <small style="color: #64748b; font-weight: 400;">(Kosongkan jika tidak ingin mengubah)</small>
                </label>
                <input type="password" name="password" placeholder="Masukkan password baru..." 
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid {{ $errors->has('password') ? '#ef4444' : '#e2e8f0' }}; outline: none;">
                @error('password')
                    <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <td style="padding: 15px 12px; text-align: center;">
    <div style="display: flex; justify-content: center; gap: 8px;">
        
        {{-- Tombol Edit (Kuning/Oranye) --}}
        <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn-action-edit">
            <i class="fas fa-edit"></i> Edit
        </a>

        {{-- Tombol Hapus (Merah) --}}
        <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-action-delete" onclick="return confirm('Yakin ingin menghapus pasien ini?')">
                <i class="fas fa-trash-alt"></i> Hapus
            </button>
        </form>

    </div>
</td>

        </form>
    </div>

</x-layouts.app>