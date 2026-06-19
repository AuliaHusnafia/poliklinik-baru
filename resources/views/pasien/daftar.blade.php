<x-layouts.app title="Daftar Poli">

    <div class="flex items-center justify-center px-4">
        <div class="w-full max-w-3xl">
            <div class="card bg-base-100 shadow">
                <div class="card-body">

                    <h2 class="text-2xl font-bold text-center mb-6">
                        🏥 Pendaftaran Poli
                    </h2>

                    {{-- Toast Success --}}
                    @if (session('message'))
                    <div id="toastSuccess" class="toast toast-top toast-end z-50">
                        <div class="alert alert-success shadow-lg">
                            <span>{{ session('message') }}</span>
                        </div>
                    </div>
                    @endif

                    {{-- Error --}}
                    @if ($errors->any())
                    <div class="alert alert-error mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('pasien.daftar-poli.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pasien" value="{{ $user->id }}">

                        {{-- Nomor RM --}}
                        <div class="mb-4">
                            <label class="font-semibold block mb-1">
                                Nomor Rekam Medis
                            </label>
                            <input type="text"
                                value="{{ $user->no_rm ?? $user->username ?? $user->name ?? '-' }}"
                                class="w-full border-2 rounded-lg p-2 bg-gray-100 text-gray-600"
                                readonly>
                        </div>

                        {{-- Pilih Poli --}}
                        <div class="mb-4">
                            <label class="font-semibold block mb-1">
                                Pilih Poli <span class="text-red-500">*</span>
                            </label>
                            <select name="id_poli" id="poliSelect" class="w-full border-2 rounded-lg p-2">
                                <option value="">-- Pilih Poli --</option>
                                @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}" {{ old('id_poli') == $poli->id ? 'selected' : '' }}>
                                    {{ $poli->nama_poli }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_poli')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Pilih Jadwal --}}
                        <div class="mb-4">
                            <label class="font-semibold block mb-1">
                                Pilih Jadwal Periksa <span class="text-red-500">*</span>
                            </label>
                            <select name="id_jadwal" id="jadwalSelect" class="w-full border-2 rounded-lg p-2">
                                <option value="">-- Pilih Jadwal --</option>
                                @foreach ($jadwals as $jadwal)
    @if($jadwal->dokter && $jadwal->dokter->user && $jadwal->dokter->user->id_poli)
        <option
            value="{{ $jadwal->id }}"
            data-poli="{{ $jadwal->dokter->user->id_poli }}"
            style="display:none"
            disabled
            {{ old('id_jadwal') == $jadwal->id ? 'selected' : '' }}>
            {{ $jadwal->hari }} |
            {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
            {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }} |
            Dr. {{ $jadwal->dokter->user->nama ?? $jadwal->dokter->nama }}
        </option>
    @endif
@endforeach
                            </select>
                            @error('id_jadwal')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Keluhan --}}
                        <div class="mb-6">
                            <label class="font-semibold block mb-1">
                                Keluhan
                            </label>
                            <textarea name="keluhan" rows="3"
                                class="w-full border-2 rounded-lg p-2"
                                placeholder="Tulis keluhan anda...">{{ old('keluhan') }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-8 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                                Daftar Poli
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const poliSelect   = document.getElementById("poliSelect");
            const jadwalSelect = document.getElementById("jadwalSelect");
            const allOptions   = Array.from(jadwalSelect.querySelectorAll("option[data-poli]"));

            poliSelect.addEventListener("change", function () {
                const poliId = this.value;

                jadwalSelect.value = "";
                jadwalSelect.querySelector("option[value='']").textContent = "-- Pilih Jadwal --";

                allOptions.forEach(option => {
                    if (poliId !== "" && option.dataset.poli === poliId) {
                        option.style.display = "";
                        option.disabled = false;
                    } else {
                        option.style.display = "none";
                        option.disabled = true;
                    }
                });
            });

            // Auto-hide toast
            const toast = document.getElementById("toastSuccess");
            if (toast) setTimeout(() => toast.remove(), 3000);
        });
    </script>
    @endpush

</x-layouts.app>