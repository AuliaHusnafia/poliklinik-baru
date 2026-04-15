<x-layouts.app title="Data Pasien">

    <x-partials.header 
        title="Data Pasien" 
        :breadcrumbs="['Poliklinik', 'Admin', 'Data Pasien']"
    >
        <a href="{{ route('admin.pasien.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Pasien
        </a>
    </x-partials.header>

    {{-- Header
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">Data Pasien</h2>

        <a href="{{ route('admin.pasien.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Pasien
        </a>
    </div> --}}

    {{-- Card --}}
    <div class="card">
        <div style="overflow-x: auto;">
            <table>
                {{-- Table Head --}}
                <thead>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Email</th>
                        <th>No. KTP</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody>
                    @forelse($pasiens as $pasien)
                    <tr>
                        <td style="font-weight: 600; color: #1e293b;">
                            {{ $pasien->nama }}
                        </td>
                        <td style="color: #64748b;">
                            {{ $pasien->email }}
                        </td>
                        <td style="color: #64748b;">
                            {{ $pasien->no_ktp ?? '-' }}
                        </td>
                        <td style="color: #64748b;">
                            {{ $pasien->no_hp ?? '-' }}
                        </td>
                        <td style="color: #64748b;">
                            {{ $pasien->alamat ?? '-' }}
                        </td>
                        <td>
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                {{-- Edit: Gunakan admin.pasien.edit --}}
                                <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn-action-edit">
                                    <i class="fas fa-pen"></i> Edit
                                </a>

                                {{-- Delete: Gunakan admin.pasien.destroy --}}
                                <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus pasien ini?')" class="btn-action-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #94a3b8;">
                            <i class="fas fa-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                            Belum ada data pasien
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layouts.app>