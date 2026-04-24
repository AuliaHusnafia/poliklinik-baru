<x-layouts.app title="Tambah Jadwal Periksa">

    {{-- HEADER --}}
    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
        
        <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i>
        </a>

        <h2 style="font-size:1.5rem; font-weight:700; color:#1e293b; margin:0;">
            Tambah Jadwal Periksa
        </h2>
    </div>

    {{-- CARD --}}
    <div class="card" style="max-width:600px;">
        <form action="{{ route('dokter.jadwal-periksa.store') }}" method="POST">
            @csrf

            {{-- HARI --}}
            <div class="form-group">
                <label class="label">
                    Hari <span class="text-danger">*</span>
                </label>

                <select name="hari" class="input" required>
                    <option value="">Pilih Hari</option>
                    @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                        <option value="{{ $day }}" {{ old('hari') == $day ? 'selected' : '' }}>
                            {{ $day }}
                        </option>
                    @endforeach
                </select>

                @error('hari')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            {{-- JAM MULAI --}}
            <div class="form-group">
                <label class="label">
                    Jam Mulai <span class="text-danger">*</span>
                </label>

                <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" class="input" required>

                @error('jam_mulai')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            {{-- JAM SELESAI --}}
            <div class="form-group">
                <label class="label">
                    Jam Selesai <span class="text-danger">*</span>
                </label>

                <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" class="input" required>

                @error('jam_selesai')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            {{-- BUTTON --}}
            <div style="display:flex; gap:10px; margin-top:20px;">
                
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>

                <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn-secondary">
                    Batal
                </a>

            </div>

        </form>
    </div>

</x-layouts.app>