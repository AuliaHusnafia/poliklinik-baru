<x-layouts.app title="Tambah Jadwal Periksa">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('dokter.jadwal-periksa.index') }}" 
           class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">
            Tambah Jadwal Periksa
        </h2>
    </div>

    {{-- Card --}}
    <div class="card bg-base-100 shadow-sm rounded-2xl border border-slate-200">
        <div class="card-body p-8">

            <form action="{{ route('dokter.jadwal-periksa.store') }}" method="POST">
                @csrf

                {{-- Hari --}}
                <div class="form-control mb-5">
                    <label class="label pb-1">
                        <span class="text-sm font-semibold text-gray-700">
                            Hari <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <select name="hari" 
                        class="select select-bordered w-full rounded-lg border-2 px-4 @error('hari') border-red-400 @enderror">
                        <option value="">Pilih Hari</option>
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>
                                {{ $hari }}
                            </option>
                        @endforeach
                    </select>
                    @error('hari')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jam Mulai --}}
                <div class="form-control mb-5">
                    <label class="label pb-1">
                        <span class="text-sm font-semibold text-gray-700">
                            Jam Mulai <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <input type="time" name="jam_mulai" 
                        value="{{ old('jam_mulai') }}"
                        class="input input-bordered w-full rounded-lg border-2 px-4 @error('jam_mulai') border-red-400 @enderror">
                    @error('jam_mulai')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jam Selesai --}}
                <div class="form-control mb-5">
                    <label class="label pb-1">
                        <span class="text-sm font-semibold text-gray-700">
                            Jam Selesai <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <input type="time" name="jam_selesai" 
                        value="{{ old('jam_selesai') }}"
                        class="input input-bordered w-full rounded-lg border-2 px-4 @error('jam_selesai') border-red-400 @enderror">
                    @error('jam_selesai')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- PERBAIKAN: Input Dropdown Status (Wajib Ada untuk Validasi Controller) --}}
                <div class="form-control mb-8">
                    <label class="label pb-1">
                        <span class="text-sm font-semibold text-gray-700">
                            Status Jadwal <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <select name="status" 
                        class="select select-bordered w-full rounded-lg border-2 px-4 @error('status') border-red-400 @enderror">
                        <option value="">Pilih Status</option>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3">
                    <button type="submit"
                        class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-6">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                    <a href="{{ route('dokter.jadwal-periksa.index') }}"
                        class="btn btn-ghost bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-lg px-6">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

</x-layouts.app>