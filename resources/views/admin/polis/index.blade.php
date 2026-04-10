<x-layouts.app>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Manajemen Poli</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Daftar Unit Poli</h3>
                    <div class="card-tools">
                        <a href="{{ route('polis.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i> Tambah Poli
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama Poli</th>
                                <th>Keterangan</th>
                                <th style="width: 200px" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($polis as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="font-weight-bold text-primary">{{ $item->nama_poli }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('polis.edit', $item->id) }}" class="btn btn-sm btn-warning shadow-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('polis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm ml-1">
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
        </div>
    </div>
</x-layouts.app>