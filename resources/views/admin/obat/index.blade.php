<x-layouts.app title="Data Obat">

    {{-- HEADER --}}
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
        <h2 style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin: 0;">
            Data Obat
        </h2>
        <a href="{{ route('admin.obat.create') }}" style="background: #3b82f6; color: white; padding: 6px 16px; border-radius: 30px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 500; font-size: 0.8rem;">
            <i class="fas fa-plus" style="font-size: 11px;"></i> Tambah Obat
        </a>
    </div>

    <style>
        .card-obat {
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow-x: auto;
            box-shadow: 0 1px 2px rgba(0,0,0,0.03);
            margin-bottom: 12px;
        }

        .tabel-obat {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.8rem;
            table-layout: fixed;
        }

        .tabel-obat th {
            text-align: left;
            padding: 10px 8px;
            background: #f8fafc;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.75rem;
        }

        .tabel-obat td {
            padding: 10px 8px;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: middle;
        }

        .tabel-obat tr:last-child td {
            border-bottom: none;
        }

        .tabel-obat tr:hover td {
            background: #faf5ff;
        }

        .col-no    { width: 40px;  text-align: center; }
        .col-nama  { width: 180px; white-space: nowrap; }
        .col-kemasan { width: 80px; }
        .col-harga { width: 100px; }
        .col-stok  { width: 90px; }
        .col-aksi  { width: 220px; }

        .badge-stok {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            border-radius: 30px;
            font-size: 0.65rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-habis    { background: #fee2e2; color: #991b1b; }
        .badge-menipis  { background: #fef3c7; color: #92400e; }
        .badge-tersedia { background: #dcfce7; color: #166534; }

        .kemasan-badge {
            background: #e0e7ff;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 0.7rem;
            color: #4338ca;
            display: inline-block;
            white-space: nowrap;
        }

        .harga-text {
            font-weight: 500;
            color: #0f172a;
            white-space: nowrap;
            font-size: 0.75rem;
        }

        .aksi-wrapper {
            display: flex;
            gap: 4px;
            flex-wrap: nowrap;
        }

        .btn-aksi {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            padding: 4px 8px;
            border-radius: 16px;
            font-size: 0.65rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            white-space: nowrap;
        }

        .btn-edit    { background: #fef3c7; color: #d97706; }
        .btn-edit:hover { background: #fde68a; }

        .btn-tambah  { background: #10b981; color: white; }
        .btn-tambah:hover { background: #059669; }

        .btn-kurangi { background: #f59e0b; color: white; }
        .btn-kurangi:hover { background: #d97706; }

        .btn-hapus   { background: #fee2e2; color: #dc2626; }
        .btn-hapus:hover { background: #fecaca; }

        .btn-disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
        }

        /* NOTIFIKASI */
        .notif-box {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            margin-bottom: 8px;
            font-size: 0.8rem;
        }

        .notif-habis {
            background: #fee2e2;
            border-left: 4px solid #dc2626;
            color: #7f1d1d;
        }

        .notif-habis strong { color: #991b1b; }

        .notif-menipis {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            color: #78350f;
        }

        .notif-menipis strong { color: #92400e; }

        /* MODAL */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            max-width: 350px;
            width: 90%;
        }

        .modal-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.75rem;
            display: block;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.85rem;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        .modal-footer {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            margin-top: 18px;
        }

        .btn-modal-batal {
            padding: 6px 14px;
            background: #f1f5f9;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.75rem;
        }

        .btn-modal-submit {
            padding: 6px 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            color: white;
            font-size: 0.75rem;
        }

        .btn-modal-tambah  { background: #10b981; }
        .btn-modal-kurangi { background: #f59e0b; }

        @media (max-width: 800px) {
            .aksi-wrapper { flex-wrap: wrap; }
            .col-aksi  { min-width: 180px; }
            .col-nama  { white-space: normal; min-width: 100px; }
        }
    </style>

    {{-- NOTIFIKASI STOK — DILETAKKAN DI ATAS TABEL --}}
    @php
        $obatsMenipis = $obats->filter(fn($o) => $o->stok > 0 && $o->stok <= 5);
        $obatsHabis   = $obats->filter(fn($o) => $o->stok <= 0);
    @endphp

    @if($obatsHabis->count() > 0)
        <div class="notif-box notif-habis">
            <i class="fas fa-times-circle" style="color: #dc2626; font-size: 1.1rem; margin-top: 1px; flex-shrink: 0;"></i>
            <div>
                <strong>⚠ STOK HABIS!</strong>
                <span>
                    {{ $obatsHabis->count() }} obat stok habis:
                    <strong>{{ $obatsHabis->pluck('nama_obat')->implode(', ') }}</strong>.
                    Segera tambah stok.
                </span>
            </div>
        </div>
    @endif

    @if($obatsMenipis->count() > 0)
        <div class="notif-box notif-menipis">
            <i class="fas fa-exclamation-triangle" style="color: #f59e0b; font-size: 1.1rem; margin-top: 1px; flex-shrink: 0;"></i>
            <div>
                <strong>⚠ STOK MENIPIS!</strong>
                <span>
                    {{ $obatsMenipis->count() }} obat stok ≤5 unit:
                    <strong>{{ $obatsMenipis->pluck('nama_obat')->implode(', ') }}</strong>.
                    Segera restock.
                </span>
            </div>
        </div>
    @endif

    {{-- TABEL --}}
    <div class="card-obat">
        <table class="tabel-obat">
            <thead>
                <tr>
                    <th class="col-no">NO</th>
                    <th class="col-nama">NAMA OBAT</th>
                    <th class="col-kemasan">KEMASAN</th>
                    <th class="col-harga">HARGA</th>
                    <th class="col-stok">STOK</th>
                    <th class="col-aksi">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($obats as $obat)
                @php
                    $stok = $obat->stok;
                    if ($stok <= 0) {
                        $badgeClass = 'badge-habis';
                        $badgeIcon  = 'fa-times-circle';
                        $badgeText  = 'HABIS';
                    } elseif ($stok <= 5) {
                        $badgeClass = 'badge-menipis';
                        $badgeIcon  = 'fa-exclamation-triangle';
                        $badgeText  = $stok . ' unit';
                    } else {
                        $badgeClass = 'badge-tersedia';
                        $badgeIcon  = 'fa-check-circle';
                        $badgeText  = $stok . ' unit';
                    }
                @endphp
                <tr>
                    <td class="col-no" style="text-align: center; color: #64748b;">{{ $loop->iteration }}</td>
                    <td class="col-nama" style="font-weight: 500; color: #1e293b;">{{ $obat->nama_obat }}</td>
                    <td class="col-kemasan">
                        <span class="kemasan-badge">{{ $obat->kemasan ?? '-' }}</span>
                    </td>
                    <td class="col-harga">
                        <span class="harga-text">Rp {{ number_format($obat->harga, 0, ',', '.') }}</span>
                    </td>
                    <td class="col-stok">
                        <span class="badge-stok {{ $badgeClass }}">
                            <i class="fas {{ $badgeIcon }}" style="font-size: 9px;"></i> {{ $badgeText }}
                        </span>
                    </td>
                    <td class="col-aksi">
                        <div class="aksi-wrapper">
                            <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn-aksi btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" onclick="openModalTambahStok({{ $obat->id }})" class="btn-aksi btn-tambah">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                            <button type="button"
                                onclick="openModalKurangiStok({{ $obat->id }})"
                                class="btn-aksi btn-kurangi {{ $stok <= 0 ? 'btn-disabled' : '' }}"
                                {{ $stok <= 0 ? 'disabled' : '' }}>
                                <i class="fas fa-minus"></i> Kurangi
                            </button>
                            <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus obat ini?')"
                                    class="btn-aksi btn-hapus">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty-state">
                        <i class="fas fa-pills" style="font-size: 36px; display: block; margin-bottom: 8px; opacity: 0.5;"></i>
                        Belum ada data obat
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MODAL TAMBAH STOK --}}
    <div id="modalTambahStok" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-title">
                <i class="fas fa-plus-circle" style="color: #10b981;"></i>
                Tambah Stok Obat
            </div>
            <form id="formTambahStok" method="POST">
                @csrf
                <label class="form-label">Jumlah Tambah *</label>
                <input type="number" name="jumlah" id="jumlahTambah" value="1" min="1" class="form-input" required>
                <div class="modal-footer">
                    <button type="button" onclick="closeModalTambahStok()" class="btn-modal-batal">Batal</button>
                    <button type="submit" class="btn-modal-submit btn-modal-tambah">Tambah Stok</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL KURANGI STOK --}}
    <div id="modalKurangiStok" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-title">
                <i class="fas fa-minus-circle" style="color: #f59e0b;"></i>
                Kurangi Stok Obat
            </div>
            <form id="formKurangiStok" method="POST">
                @csrf
                <label class="form-label">Jumlah Kurangi *</label>
                <input type="number" name="jumlah" id="jumlahKurangi" value="1" min="1" class="form-input" required>
                <div class="modal-footer">
                    <button type="button" onclick="closeModalKurangiStok()" class="btn-modal-batal">Batal</button>
                    <button type="submit" class="btn-modal-submit btn-modal-kurangi">Kurangi Stok</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModalTambahStok(id) {
            document.getElementById('modalTambahStok').style.display = 'flex';
            document.getElementById('formTambahStok').action = '/admin/obat/' + id + '/tambah-stok';
            document.getElementById('jumlahTambah').focus();
        }
        function closeModalTambahStok() {
            document.getElementById('modalTambahStok').style.display = 'none';
        }
        function openModalKurangiStok(id) {
            document.getElementById('modalKurangiStok').style.display = 'flex';
            document.getElementById('formKurangiStok').action = '/admin/obat/' + id + '/kurangi-stok';
            document.getElementById('jumlahKurangi').focus();
        }
        function closeModalKurangiStok() {
            document.getElementById('modalKurangiStok').style.display = 'none';
        }
        window.onclick = function(e) {
            if (e.target === document.getElementById('modalTambahStok'))  closeModalTambahStok();
            if (e.target === document.getElementById('modalKurangiStok')) closeModalKurangiStok();
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') { closeModalTambahStok(); closeModalKurangiStok(); }
        });
    </script>

</x-layouts.app>