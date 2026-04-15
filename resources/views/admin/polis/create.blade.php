<x-layouts.app title="Tambah Poli">

    {{-- Header --}}
    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
        <a href="{{ route('admin.poli.index') }}" 
           style="display: flex; align-items: center; justify-content: center; 
                  width: 36px; height: 36px; border-radius: 8px; 
                  background: #f1f5f9; color: #64748b; text-decoration: none;">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>

        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">
            Tambah Poli
        </h2>
    </div>

    {{-- Card --}}
    <div class="card">
        <form action="{{ route('admin.poli.store') }}" method="POST">
            @csrf

            {{-- Nama Poli --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">
                    Nama Poli <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" 
                       name="nama_poli"
                       value="{{ old('nama_poli') }}"
                       placeholder="Contoh: Poli Gigi, Poli Umum..."
                       style="width: 100%; padding: 10px; border-radius: 8px; 
                              border: 2px solid {{ $errors->has('nama_poli') ? '#ef4444' : '#e2e8f0' }};"
                       required>
                @error('nama_poli')
                    <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div style="margin-bottom: 30px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">
                    Keterangan <span style="color: #ef4444;">*</span>
                </label>
                <textarea name="keterangan" rows="4"
                          placeholder="Contoh: Poli khusus menangani kesehatan gigi dan mulut..."
                          style="width: 100%; padding: 10px; border-radius: 8px; 
                                 border: 2px solid {{ $errors->has('keterangan') ? '#ef4444' : '#e2e8f0' }};"
                          required>{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p style="color: #ef4444; font-size: 0.75rem; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>

                <a href="{{ route('admin.poli.index') }}" 
                   style="background: #f1f5f9; color: #64748b; padding: 12px 25px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: 0.2s;">
                    <i class="fas fa-arrow-left"></i> Batal
                </a>
            </div>

        </form>
    </div>

</x-layouts.app>