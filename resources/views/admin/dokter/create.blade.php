<x-layouts.app title="Tambah Dokter">

    {{-- Header --}}
    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
        {{-- Perbaikan: Tambahkan 'admin.' pada rute --}}
        <a href="{{ route('admin.dokter.index') }}" 
           style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: #f1f5f9; color: #64748b; text-decoration: none; transition: 0.3s;">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">Tambah Dokter</h2>
    </div>

    {{-- Form Card --}}
    <div class="card">
        {{-- Perbaikan: Tambahkan 'admin.' pada action form --}}
        <form action="{{ route('admin.dokter.store') }}" method="POST">
            @csrf

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 20px;">
                
                {{-- Nama --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        Nama Dokter <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama dokter..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #e2e8f0; outline: none;" required>
                    @error('nama') <small style="color: #ef4444; display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        Email <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #e2e8f0; outline: none;" required>
                    @error('email') <small style="color: #ef4444; display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                </div>

                {{-- No KTP --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        No. KTP <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="no_ktp" value="{{ old('no_ktp') }}" placeholder="Masukkan No. KTP (16 digit)..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #e2e8f0; outline: none;" required>
                    @error('no_ktp') <small style="color: #ef4444; display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                </div>

                {{-- No HP --}}
                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                        No. HP <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="Contoh: 0812..."
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #e2e8f0; outline: none;" required>
                    @error('no_hp') <small style="color: #ef4444; display: block; margin-top: 4px;">{{ $message }}</small> @enderror
                </div>
            </div>

            {{-- Alamat --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                    Alamat <span style="color: #ef4444;">*</span>
                </label>
                <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap..." 
                          style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #e2e8f0; outline: none;" required>{{ old('alamat') }}</textarea>
                @error('alamat') <small style="color: #ef4444; display: block; margin-top: 4px;">{{ $message }}</small> @enderror
            </div>

            {{-- Poli --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                    Pilih Poli <span style="color: #ef4444;">*</span>
                </label>
                <select name="id_poli" style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #e2e8f0; background: white; cursor: pointer;" required>
                    <option value="">-- Pilih Unit Poli --</option>
                    @foreach($polis as $poli)
                        <option value="{{ $poli->id }}" {{ old('id_poli') == $poli->id ? 'selected' : '' }}>
                            {{ $poli->nama_poli }}
                        </option>
                    @endforeach
                </select>
                @error('id_poli') <small style="color: #ef4444; display: block; margin-top: 4px;">{{ $message }}</small> @enderror
            </div>

            {{-- Password --}}
            <div style="margin-bottom: 30px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569; font-size: 0.9rem;">
                    Password Akun Dokter <span style="color: #ef4444;">*</span>
                </label>
                <input type="password" name="password" placeholder="Minimal 8 karakter..." 
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #e2e8f0;" required>
                @error('password') <small style="color: #ef4444; display: block; margin-top: 4px;">{{ $message }}</small> @enderror
            </div>

            {{-- Action Buttons --}}
            <div style="display: flex; gap: 12px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <button type="submit" class="btn-primary" style="border: none; cursor: pointer; display: flex; align-items: center; gap: 8px; padding: 12px 25px;">
                    <i class="fas fa-save"></i> Simpan Data Dokter
                </button>
                {{-- Perbaikan: Tambahkan 'admin.' pada link batal --}}
                <a href="{{ route('admin.dokter.index') }}" 
                   style="background: #f1f5f9; color: #64748b; padding: 12px 25px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: 0.2s;">
                    Batal
                </a>
            </div>
        </form>
    </div>

</x-layouts.app>