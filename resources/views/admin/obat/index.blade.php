<x-layouts.app title="Data Obat">

    <x-partials.header 
        title="Data Obat" 
        :breadcrumbs="['Poliklinik', 'Admin', 'Data Obat']"
    >
        <a href="{{ route('admin.obat.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Obat
        </a>
    </x-partials.header>

    {{-- HEADER
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">
            Data Obat
        </h2>

        <a href="{{ route('admin.obat.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Obat
        </a>
    </div> --}}

    {{-- CARD --}}
    <div class="card">
        <div style="overflow-x: auto;">
            <table>

                {{-- HEAD --}}
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Kemasan</th>
                        <th>Harga</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>
                    @forelse($obats as $obat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td style="font-weight: 600; color: #1e293b;">
                            {{ $obat->nama_obat }}
                        </td>

                        <td>
                            <span class="badge-poli">
                                {{ $obat->kemasan }}
                            </span>
                        </td>

                        <td style="color: #64748b;">
                            Rp {{ number_format($obat->harga, 0, ',', '.') }}
                        </td>

                        <td>
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                
                                <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn-action-edit">
                                    <i class="fas fa-pen"></i> Edit
                                </a>

                                <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus obat ini?')" class="btn-action-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: #94a3b8;">
                            <i class="fas fa-pills" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                            Belum ada data obat
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</x-layouts.app>