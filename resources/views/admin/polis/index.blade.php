<x-layouts.app>
    <x-slot name="title">Manajemen Poli</x-slot>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-weight: 700;"><i class="fas fa-hospital"></i> Daftar Unit Poli</h3>
            <a href="{{ route('admin.polis.create') }}" class="btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Poli
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Poli</th>
                    <th>Keterangan</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($polis as $poli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $poli->nama_poli }}</strong></td>
                    <td>{{ $poli->keterangan }}</td>
                    <td style="text-align: center; display: flex; gap: 8px; justify-content: center;">
                        <a href="{{ route('admin.polis.edit', $poli->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.polis.destroy', $poli->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</x-layouts.app>