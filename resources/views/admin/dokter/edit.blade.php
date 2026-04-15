<x-layouts.app title="Edit Dokter">

    {{-- Header --}}
    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
        
        {{-- Tombol Kembali --}}
        <a href="{{ route('admin.dokter.index') }}" 
           style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: #f1f5f9; color: #64748b; text-decoration: none; transition: 0.3s;">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>

        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">
            Edit Dokter
        </h2>
    </div>

    {{-- Form Card --}}
    <div class="card">
        <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 20px;">

                {{-- Nama --}}
                <div class="form-group">
                    <label style="display:block; font-weight:600; margin-bottom:8px; color:#475569; font-size:0.9rem;">
                        Nama Dokter <span style="color:#ef4444;">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama', $dokter->nama) }}"
                        placeholder="Masukkan nama dokter..."
                        style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('nama') ? '#ef4444' : '#e2e8f0' }}; outline:none;" required>
                    @error('nama')
                        <p style="color:#ef4444; font-size:0.75rem; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label style="display:block; font-weight:600; margin-bottom:8px; color:#475569; font-size:0.9rem;">
                        Email <span style="color:#ef4444;">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', $dokter->email) }}"
                        placeholder="Masukkan email..."
                        style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('email') ? '#ef4444' : '#e2e8f0' }}; outline:none;" required>
                    @error('email')
                        <p style="color:#ef4444; font-size:0.75rem; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No KTP --}}
                <div class="form-group">
                    <label style="display:block; font-weight:600; margin-bottom:8px; color:#475569; font-size:0.9rem;">
                        No. KTP <span style="color:#ef4444;">*</span>
                    </label>
                    <input type="text" name="no_ktp" value="{{ old('no_ktp', $dokter->no_ktp) }}"
                        placeholder="Masukkan No. KTP..."
                        style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('no_ktp') ? '#ef4444' : '#e2e8f0' }}; outline:none;" required>
                    @error('no_ktp')
                        <p style="color:#ef4444; font-size:0.75rem; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="form-group">
                    <label style="display:block; font-weight:600; margin-bottom:8px; color:#475569; font-size:0.9rem;">
                        No. HP <span style="color:#ef4444;">*</span>
                    </label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $dokter->no_hp) }}"
                        placeholder="Masukkan No. HP..."
                        style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('no_hp') ? '#ef4444' : '#e2e8f0' }}; outline:none;" required>
                    @error('no_hp')
                        <p style="color:#ef4444; font-size:0.75rem; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Poli --}}
                <div style="grid-column: 1 / -1;">
                    <label style="display:block; font-weight:600; margin-bottom:8px; color:#475569; font-size:0.9rem;">
                        Pilih Poli <span style="color:#ef4444;">*</span>
                    </label>

                    <select name="id_poli"
                        style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('id_poli') ? '#ef4444' : '#e2e8f0' }}; outline:none;" required>
                        @foreach($polis as $poli)
                            <option value="{{ $poli->id }}"
                                {{ $dokter->id_poli == $poli->id ? 'selected' : '' }}>
                                {{ $poli->nama_poli }}
                            </option>
                        @endforeach
                    </select>

                    @error('id_poli')
                        <p style="color:#ef4444; font-size:0.75rem; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Alamat --}}
            <div style="margin-bottom: 25px;">
                <label style="display:block; font-weight:600; margin-bottom:8px; color:#475569; font-size:0.9rem;">
                    Alamat <span style="color:#ef4444;">*</span>
                </label>

                <textarea name="alamat" rows="3"
                    placeholder="Masukkan alamat..."
                    style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('alamat') ? '#ef4444' : '#e2e8f0' }}; outline:none;">{{ old('alamat', $dokter->alamat) }}</textarea>

                @error('alamat')
                    <p style="color:#ef4444; font-size:0.75rem; margin-top:5px;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div style="display:flex; justify-content:space-between; align-items:center;">

                {{-- Tombol Kembali --}}
                <a href="{{ route('admin.dokter.index') }}"
                   style="padding:10px 14px; border-radius:8px; background:#f1f5f9; color:#475569; text-decoration:none; font-weight:600;">
                    Batal
                </a>

                {{-- Tombol Submit --}}
                <button type="submit"
                    style="padding:10px 16px; border-radius:8px; background:#2563eb; color:white; border:none; font-weight:600; cursor:pointer;">
                    <i class="fas fa-save"></i> Update Data
                </button>

            </div>

        </form>
    </div>

</x-layouts.app>