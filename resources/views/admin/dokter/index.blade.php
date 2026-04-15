<x-layouts.app title="Data Dokter">

    <x-partials.header 
        title="Data Dokter" 
        :breadcrumbs="['Poliklinik', 'Admin', 'Data Dokter']"
    >
        <a href="{{ route('admin.dokter.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Dokter
        </a>
    </x-partials.header>

    {{-- CARD --}}
    <div class="card">
        <div style="overflow-x: auto;">
            <table>

                {{-- HEAD --}}
                <thead>
                    <tr>
                        <th>Nama Dokter</th>
                        <th>Email</th>
                        <th>No. KTP</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Poli</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>
                    @forelse($dokters as $dokter)
                    <tr>
                        <td style="font-weight: 600; color: #1e293b;">
                            {{ $dokter->nama }}
                        </td>

                        <td style="color: #64748b;">
                            {{ $dokter->email }}
                        </td>

                        <td style="color: #64748b;">
                            {{ $dokter->no_ktp ?? '-' }}
                        </td>

                        <td style="color: #64748b;">
                            {{ $dokter->no_hp ?? '-' }}
                        </td>

                        <td style="color: #64748b;">
                            {{ $dokter->alamat ?? '-' }}
                        </td>

                        <td>
                            <span class="badge-poli">
                                {{ $dokter->poli->nama_poli ?? 'Tidak ada poli' }}
                            </span>
                        </td>

                        {{-- AKSI --}}
                        <td style="text-align: center;">
                            <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                
                                {{-- Edit --}}
                                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" 
                                   class="btn-action-edit"
                                   style="display: inline-flex; align-items: center; gap: 5px;">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus dokter ini?')"
                                            class="btn-action-delete"
                                            style="display: inline-flex; align-items: center; gap: 5px;">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #94a3b8;">
                            <i class="fas fa-user-doctor" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                            Belum ada data dokter
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</x-layouts.app>