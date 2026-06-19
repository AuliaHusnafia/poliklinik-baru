<x-layouts.app title="Edit Jadwal Periksa">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('dokter.jadwal-periksa.index') }}" 
           class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">
            Edit Jadwal Periksa
        </h2>
    </div>

    {{-- Masukkan kode ini untuk mendeteksi error yang tersumbat --}}
    @if ($errors->any())
        <div class="alert alert-error shadow-sm rounded-xl mb-5 bg-red-100 text-red-800 p-4">
            <div class="flex flex-col gap-1">
                <span class="font-bold">Gagal menyimpan data:</span>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Card Form Kamu --}}
    <div class="card bg-base-100 shadow-sm rounded-2xl border border-slate-200">

    {{-- Card (Mengembalikan Card Form yang Hilang) --}}
    <div class="card bg-base-100 shadow-sm rounded-2xl border border-slate-200">
        <div class="card-body p-8">

            <form action="{{ route('dokter.jadwal-periksa.update', $jadwalPeriksa->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- WAJIB: Agar Laravel tahu ini adalah proses Update --}}

                {{-- Hari --}}
                <div class="form-control mb-5">
                    <label class="label pb-1">
                        <span class="text-sm font-semibold text-gray-700">
                            Hari <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <select name="hari" 
                        class="select select-bordered w-full rounded-lg border-2 px-4 @error('hari') border-red-400 @enderror">
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ old('hari', $jadwalPeriksa->hari) == $hari ? 'selected' : '' }}>
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
                        value="{{ old('jam_mulai', \Carbon\Carbon::parse($jadwalPeriksa->jam_mulai)->format('H:i')) }}"
                        class="input input-bordered w-full rounded-lg border-2 px-4 @error('jam_mulai') border-red-400 @enderror">
                    @error('jam_mulai')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jam Selesai --}}
                <div class="form-control mb-8">
                    <label class="label pb-1">
                        <span class="text-sm font-semibold text-gray-700">
                            Jam Selesai <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <input type="time" name="jam_selesai" 
                        value="{{ old('jam_selesai', \Carbon\Carbon::parse($jadwalPeriksa->jam_selesai)->format('H:i')) }}"
                        class="input input-bordered w-full rounded-lg border-2 px-4 @error('jam_selesai') border-red-400 @enderror">
                    @error('jam_selesai')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3">
                    <button type="submit"
                        class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-6">
                        <i class="fas fa-save"></i>
                        Update Jadwal
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