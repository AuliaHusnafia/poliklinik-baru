<x-layouts.app title="Edit Poli">
    <div class="card-modern">
        <div class="card-header-modern">
            <div class="card-title-modern">
                <i class="fas fa-edit" style="color: #f59e0b;"></i> 
                <span>Edit Unit Poli</span>
            </div>
            <a href="{{ route('admin.polis.index') }}" class="btn-secondary-modern">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body-modern" style="padding: 30px; max-width: 800px;">
            {{-- Pastikan route action menggunakan admin.polis.update --}}
            <form action="{{ route('admin.polis.update', $poli->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group-modern" style="margin-bottom: 24px;">
                    <label for="nama_poli" class="label-modern" style="display: block; font-weight: 600; margin-bottom: 10px; color: #334155;">
                        Nama Poli <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" 
                           name="nama_poli" 
                           id="nama_poli" 
                           class="input-modern" 
                           style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem;"
                           placeholder="Masukkan nama poli" 
                           value="{{ old('nama_poli', $poli->nama_poli) }}" 
                           required>
                    @error('nama_poli')
                        <p style="color: #ef4444; font-size: 0.8rem; margin-top: 6px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group-modern" style="margin-bottom: 30px;">
                    <label for="keterangan" class="label-modern" style="display: block; font-weight: 600; margin-bottom: 10px; color: #334155;">
                        Keterangan <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea name="keterangan" 
                              id="keterangan" 
                              rows="5" 
                              class="input-modern" 
                              style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; resize: none;"
                              placeholder="Tuliskan deskripsi unit poli..." 
                              required>{{ old('keterangan', $poli->keterangan) }}</textarea>
                    @error('keterangan')
                        <p style="color: #ef4444; font-size: 0.8rem; margin-top: 6px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="display: flex; align-items: center; gap: 15px; padding-top: 20px; border-top: 1px solid #f1f5f9;">
                    <button type="submit" class="btn-primary-modern" style="padding: 12px 28px; font-size: 0.9rem; background-color: #f59e0b;">
                        <i class="fas fa-sync-alt"></i> Perbarui Data
                    </button>
                    <a href="{{ route('admin.polis.index') }}" class="btn-secondary-modern" style="padding: 12px 28px; font-size: 0.9rem; background: #f8fafc; color: #64748b;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>