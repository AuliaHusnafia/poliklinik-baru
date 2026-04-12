{{-- File: resources/views/admin/dashboard.blade.php --}}
<x-layouts.app title="Dashboard Admin">
    <div class="card-modern">
        <div class="card-body-modern" style="padding: 2rem;">
            <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #e0e7ff, #c7d2fe); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-hand-sparkles" style="font-size: 2rem; color: #3b82f6;"></i>
                </div>
                <div>
                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #0f172a;">Selamat Datang, Admin! 👋</h3>
                    <p style="color: #64748b; margin-top: 4px;">Sistem manajemen Poliklinik siap digunakan. Pilih menu di samping untuk memulai.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
        <div class="card-modern" style="border-left: 4px solid #3b82f6;">
            <div style="padding: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <p style="color: #64748b; font-size: 0.85rem;">Total Poli</p>
                        <p style="font-size: 2rem; font-weight: 700; color: #0f172a;">{{ \App\Models\Poli::count() }}</p>
                    </div>
                    <i class="fas fa-hospital" style="font-size: 2.5rem; color: #cbd5e1;"></i>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>