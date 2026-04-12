<x-layouts.app>
    <x-slot name="title">Data Dokter</x-slot>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="font-weight: 700; color: #1e293b; font-size: 1.5rem;">Data Dokter</h2>
            <a href="{{ route('admin.dokter.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i> Tambah Dokter
            </a>
        </div>

        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>NAMA DOKTER</th>
                        <th>EMAIL</th>
                        <th>NO. KTP</th>
                        <th>NO. HP</th>
                        <th>ALAMAT</th>
                        <th>POLI</th>
                        <th style="text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokters as $dokter)
                    <tr>
                        <td style="font-weight: 600;">{{ $dokter->nama }}</td>
                        <td style="color: #64748b;">{{ $dokter->email }}</td>
                        <td>{{ $dokter->no_ktp }}</td>
                        <td>{{ $dokter->no_hp }}</td>
                        <td>{{ $dokter->alamat }}</td>
                        <td>
                            <span class="badge-poli">
                                {{ $dokter->poli->nama_poli ?? 'Tidak ada poli' }}
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn-action-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Yakin hapus dokter ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>