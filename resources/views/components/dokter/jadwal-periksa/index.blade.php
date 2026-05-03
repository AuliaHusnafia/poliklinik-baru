<x-layouts.app title="Jadwal Periksa">

    {{-- HEADER --}}
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
        <h2 style="font-size:1.5rem; font-weight:700; color:#1e293b; margin:0;">
            Jadwal Periksa
        </h2>

        <a href="{{ route('dokter.jadwal-periksa.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </a>
    </div>

    {{-- ALERT --}}
    @if (session('message'))
        <div class="alert-success">
            <i class="fas fa-circle-check"></i>
            {{ session('message') }}
        </div>
    @endif

    {{-- CARD --}}
    <div class="card">
        <div style="overflow-x:auto;">
            <table>

                {{-- HEAD --}}
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>
                    @forelse ($jadwalPeriksas as $jadwalPeriksa)
                    <tr>

                        <td>{{ $jadwalPeriksa->id }}</td>

                        <td style="font-weight:600;">
                            {{ $jadwalPeriksa->hari }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($jadwalPeriksa->jam_mulai)->format('H:i') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($jadwalPeriksa->jam_selesai)->format('H:i') }}
                        </td>

                        <td>
                            <div style="display:flex; justify-content:center; gap:8px;">

                                {{-- EDIT --}}
                                <a href="{{ route('dokter.jadwal-periksa.edit', $jadwalPeriksa->id) }}" class="btn-action-edit">
                                    <i class="fas fa-pen"></i> Edit
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('dokter.jadwal-periksa.destroy', $jadwalPeriksa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus jadwal ini?')"
                                        class="btn-action-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:40px; color:#94a3b8;">
                            <i class="fas fa-calendar-xmark" style="font-size:2rem; display:block; margin-bottom:10px;"></i>
                            Belum ada jadwal periksa
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</x-layouts.app>