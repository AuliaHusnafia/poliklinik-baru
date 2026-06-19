<x-layouts.app title="Jadwal Periksa">

    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0;">
            Jadwal Periksa
        </h2>
        <a href="{{ route('dokter.jadwal-periksa.create') }}" 
           style="background: #3b82f6; color: white; padding: 8px 20px; border-radius: 40px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 500; font-size: 0.85rem;">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </a>
    </div>

    <div style="background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow-x: auto; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                    <th style="padding: 14px 16px; text-align: left; font-weight: 600; color: #1e293b;">No</th>
                    <th style="padding: 14px 16px; text-align: left; font-weight: 600; color: #1e293b;">Hari</th>
                    <th style="padding: 14px 16px; text-align: left; font-weight: 600; color: #1e293b;">Jam Mulai</th>
                    <th style="padding: 14px 16px; text-align: left; font-weight: 600; color: #1e293b;">Jam Selesai</th>
                    <th style="padding: 14px 16px; text-align: left; font-weight: 600; color: #1e293b;">Status</th>
                    <th style="padding: 14px 16px; text-align: center; font-weight: 600; color: #1e293b;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $index => $jadwal)
                <tr style="border-bottom: 1px solid #f0f2f5;">
                    <td style="padding: 14px 16px; color: #64748b;">{{ $index + 1 }}</td>
                    <td style="padding: 14px 16px; font-weight: 500; color: #1e293b;">{{ $jadwal->hari }}</td>
                    <td style="padding: 14px 16px; color: #475569;">{{ $jadwal->jam_mulai }}</td>
                    <td style="padding: 14px 16px; color: #475569;">{{ $jadwal->jam_selesai }}</td>
                    <td style="padding: 14px 16px;">
                        @if($jadwal->status == 'aktif')
                            <span style="background: #dcfce7; color: #166534; padding: 4px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;">
                                <i class="fas fa-check-circle"></i> Aktif
                            </span>
                        @else
                            <span style="background: #fee2e2; color: #991b1b; padding: 4px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;">
                                <i class="fas fa-times-circle"></i> Tidak Aktif
                            </span>
                        @endif
                    </td>
                    <td style="padding: 14px 16px; text-align: center;">
                        <div style="display: flex; gap: 8px; justify-content: center;">
                            <a href="{{ route('dokter.jadwal-periksa.edit', $jadwal->id) }}" 
                               style="background: #fef3c7; color: #d97706; padding: 6px 14px; border-radius: 30px; text-decoration: none; font-size: 0.75rem; font-weight: 500;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('dokter.jadwal-periksa.destroy', $jadwal->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus jadwal ini?')" 
                                        style="background: #fee2e2; color: #dc2626; padding: 6px 14px; border-radius: 30px; border: none; cursor: pointer; font-size: 0.75rem; font-weight: 500;">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 60px; color: #94a3b8;">
                        <i class="fas fa-calendar-alt" style="font-size: 48px; display: block; margin-bottom: 16px; opacity: 0.5;"></i>
                        Belum ada jadwal periksa. Silakan tambah jadwal.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.app>