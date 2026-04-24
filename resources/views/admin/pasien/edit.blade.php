<x-layouts.app title="Edit Pasien">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.pasien.index') }}"
            class="flex items-center justify-center w-9 h-9 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>

        <h2 class="text-2xl font-bold text-slate-800">
            Edit Pasien
        </h2>
    </div>

    {{-- Card --}}
    <div class="card bg-base-100 shadow-md rounded-2xl border border-slate-200">
        <div class="card-body p-8">

            <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nama --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="font-semibold text-gray-700">Nama Pasien *</span>
                        </label>
                        <input type="text" name="nama"
                            value="{{ old('nama', $pasien->nama) }}"
                            class="input input-bordered w-full @error('nama') input-error @enderror" required>
                        @error('nama')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="font-semibold text-gray-700">Email *</span>
                        </label>
                        <input type="email" name="email"
                            value="{{ old('email', $pasien->email) }}"
                            class="input input-bordered w-full @error('email') input-error @enderror" required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- No KTP --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="font-semibold text-gray-700">No. KTP *</span>
                        </label>
                        <input type="text" name="no_ktp"
                            value="{{ old('no_ktp', $pasien->no_ktp) }}"
                            class="input input-bordered w-full @error('no_ktp') input-error @enderror" required>
                        @error('no_ktp')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- No HP --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="font-semibold text-gray-700">No. HP *</span>
                        </label>
                        <input type="text" name="no_hp"
                            value="{{ old('no_hp', $pasien->no_hp) }}"
                            class="input input-bordered w-full @error('no_hp') input-error @enderror" required>
                        @error('no_hp')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- Alamat --}}
                <div class="form-control mt-6">
                    <label class="label">
                        <span class="font-semibold text-gray-700">Alamat *</span>
                    </label>
                    <textarea name="alamat" rows="3"
                        class="textarea textarea-bordered w-full @error('alamat') textarea-error @enderror"
                        required>{{ old('alamat', $pasien->alamat) }}</textarea>
                    @error('alamat')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-control mt-6">
                    <label class="label">
                        <span class="font-semibold text-gray-700">
                            Password
                            <span class="text-sm text-gray-400">(opsional)</span>
                        </span>
                    </label>
                    <input type="password" name="password"
                        class="input input-bordered w-full @error('password') input-error @enderror">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3 mt-8">
                    <button type="submit"
                        class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-6">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>

                    <a href="{{ route('admin.pasien.index') }}"
                        class="btn btn-ghost bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-lg px-6">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

</x-layouts.app>