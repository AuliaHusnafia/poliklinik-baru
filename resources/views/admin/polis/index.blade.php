<x-layouts.app title="Manajemen Poli">
    <div class="card-modern">
        <div class="card-header-modern d-flex justify-content-between align-items-center">
            <div class="card-title-modern">
                <i class="fas fa-clinic-medical text-primary mr-2"></i>
                Daftar Unit Poli
            </div>
            <a href="{{ route('admin.polis.create') }}" class="btn-primary-modern">
                <i class="fas fa-plus-circle"></i> Tambah Poli
            </a>
        </div>

        <div class="card-body-modern p-0">
            <div class="table-responsive">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">No</th>
                            <th>Nama Poli</th>
                            <th>Keterangan</th>
                            <th class="text-center" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($polis as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>
                                <span class="badge-info-modern">{{ $item->nama_poli }}</span>
                            </td>
                            <td class="text-muted">{{ Str::limit($item->keterangan, 50) }}</td>
                            <td class="text-center">
                                <div class="action-buttons">
                                    <a href="{{ route('admin.polis.edit', $item->id) }}" class="btn-edit-small" title="Edit Data">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.polis.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus poli ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete-small">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <img src="{{ asset('assets/img/empty.svg') }}" alt="Empty" style="width: 150px; opacity: 0.5;">
                                <p class="mt-3 text-secondary">Belum ada data poli tersedia.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>