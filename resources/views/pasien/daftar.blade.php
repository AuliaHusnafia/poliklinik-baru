<x-layouts.app title="Daftar Poli">

<div class="min-h-screen flex items-center justify-center px-4 py-8 bg-gray-100">
    <div class="w-full max-w-3xl">

        <div class="card bg-white shadow-lg rounded-2xl">
            <div class="card-body p-6">

                <h2 class="text-2xl font-bold text-center mb-6">
                    🏥 Pendaftaran Poli
                </h2>

                {{-- Toast Success --}}
                @if (session('message'))
                    <div class="toast toast-top toast-end z-50">
                        <div class="alert alert-success shadow-lg">
                            <span>{{ session('message') }}</span>
                        </div>
                    </div>
                @endif

                {{-- Error --}}
                @if ($errors->any())
                    <div class="alert alert-error mb-4">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pasien.daftar-poli.submit') }}" method="POST" class="space-y-4">
                    @csrf

                    <input type="hidden" name="id_pasien" value="{{ $user->id }}">

                    {{-- Nomor RM --}}
                    <div>
                        <label class="font-semibold block mb-1 text-sm">
                            Nomor Rekam Medis
                        </label>
                        <input type="text" value="{{ $user->no_rm }}"
                            class="w-full border rounded-lg px-3 py-2 bg-gray-100 text-sm"
                            disabled>
                    </div>

                    {{-- Pilih Poli --}}
                    <div>
                        <label class="font-semibold block mb-1 text-sm">
                            Pilih Poli
                        </label>
                        <select name="id_poli" id="poliSelect"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400">
                            <option value="">-- Pilih Poli --</option>
                            @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}">
                                    {{ $poli->nama_poli }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Pilih Jadwal --}}
                    <div>
                        <label class="font-semibold block mb-1 text-sm">
                            Pilih Jadwal Periksa
                        </label>
                        <select name="id_jadwal" id="jadwalSelect"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400">
                            <option value="">-- Pilih Jadwal --</option>

                            @foreach ($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}" data-poli="{{ $jadwal->dokter->id_poli }}">
                                    {{ $jadwal->hari }}
                                    {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                    | Dr. {{ $jadwal->dokter->nama ?? '--' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Keluhan --}}
                    <div>
                        <label class="font-semibold block mb-1 text-sm">
                            Keluhan
                        </label>
                        <textarea name="keluhan" rows="3"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400"
                            placeholder="Tulis keluhan anda..."></textarea>
                    </div>

                    {{-- Button --}}
                    <div class="flex justify-end pt-2">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition">
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
document.addEventListener("DOMContentLoaded", function(){

    const poliSelect = document.getElementById("poliSelect")
    const jadwalSelect = document.getElementById("jadwalSelect")
    const jadwalOptions = jadwalSelect.querySelectorAll("option")

    poliSelect.addEventListener("change", function(){
        let poliId = this.value

        jadwalOptions.forEach(option => {
            if(option.value === ""){
                option.style.display = "block"
                return
            }

            if(option.dataset.poli === poliId){
                option.style.display = "block"
            } else {
                option.style.display = "none"
            }
        })

        jadwalSelect.value = ""
    })
})
</script>
@endpush

</x-layouts.app>