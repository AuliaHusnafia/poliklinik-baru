<x-layouts.app title="Edit Jadwal Periksa">

    {{-- Header --}}
    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
        <a href="{{ route('dokter.jadwal-periksa.index') }}" 
           style="display:flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:8px; background:#f1f5f9; color:#64748b; text-decoration:none;">
            <i class="fas fa-arrow-left"></i>
        </a>

        <h2 style="font-size:1.5rem; font-weight:700; color:#1e293b; margin:0;">
            Edit Jadwal Periksa
        </h2>
    </div>

    {{-- Card --}}
    <div class="card-modern" style="max-width:700px;">
        <div class="card-body-modern" style="padding:30px;">

            <form action="{{ route('dokter.jadwal-periksa.update', $jadwalPeriksa->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Hari --}}
                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:600; margin-bottom:8px;">
                        Hari <span style="color:red">*</span>
                    </label>

                    <select name="hari" 
                            style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('hari') ? '#ef4444' : '#e2e8f0' }};">
                        <option value="">Pilih Hari</option>
                        @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                            <option value="{{ $day }}" 
                                {{ (old('hari') ?? $jadwalPeriksa->hari) == $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>

                    @error('hari')
                        <p style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jam Mulai --}}
                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:600; margin-bottom:8px;">
                        Jam Mulai <span style="color:red">*</span>
                    </label>

                    <input type="time" name="jam_mulai"
                           value="{{ old('jam_mulai', $jadwalPeriksa->jam_mulai) }}"
                           style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('jam_mulai') ? '#ef4444' : '#e2e8f0' }};">

                    @error('jam_mulai')
                        <p style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jam Selesai --}}
                <div style="margin-bottom:30px;">
                    <label style="display:block; font-weight:600; margin-bottom:8px;">
                        Jam Selesai <span style="color:red">*</span>
                    </label>

                    <input type="time" name="jam_selesai"
                           value="{{ old('jam_selesai', $jadwalPeriksa->jam_selesai) }}"
                           style="width:100%; padding:10px; border-radius:8px; border:2px solid {{ $errors->has('jam_selesai') ? '#ef4444' : '#e2e8f0' }};">

                    @error('jam_selesai')
                        <p style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div style="display:flex; gap:12px;">
                    
                    <button type="submit" class="btn-primary-modern">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>

                    <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn-secondary-modern">
                        Batal
                    </a>

                </div>

            </form>

        </div>
    </div>

</x-layouts.app>