<x-layouts.guest title="Register Pasien">
    <div style="background: white; padding: 40px; border-radius: 24px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3); width: 100%; max-width: 500px; z-index: 10; margin: 20px auto;">
        
        <div style="text-align: center; margin-bottom: 24px;">
            <div style="width: 60px; height: 60px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;">
                <img src="{{ asset('images/logo-bengkot.png') }}" alt="Logo" style="width: 35px;">
            </div>
            <h2 style="font-size: 22px; font-weight: 800; color: #1e2d6b; margin-bottom: 4px;">Poliklinik</h2>
            <p style="color: #64748b; font-size: 13px;">Buat akun baru</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #1e2d6b; margin-bottom: 5px;">Nama Lengkap</label>
                <div style="position: relative;">
                    <i class="fas fa-user" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap..." required 
                        style="width: 100%; padding: 10px 16px 10px 45px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #1e2d6b; margin-bottom: 5px;">Email</label>
                <div style="position: relative;">
                    <i class="fas fa-envelope" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="email" name="email" placeholder="Masukkan email..." required 
                        style="width: 100%; padding: 10px 16px 10px 45px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #1e2d6b; margin-bottom: 5px;">Alamat</label>
                <div style="position: relative;">
                    <i class="fas fa-map-marker-alt" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="text" name="alamat" placeholder="Masukkan alamat..." required 
                        style="width: 100%; padding: 10px 16px 10px 45px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #1e2d6b; margin-bottom: 5px;">No. HP</label>
                    <div style="position: relative;">
                        <i class="fas fa-phone" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="no_hp" placeholder="No. HP..." required 
                            style="width: 100%; padding: 10px 16px 10px 45px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none;">
                    </div>
                </div>
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #1e2d6b; margin-bottom: 5px;">No. KTP</label>
                    <div style="position: relative;">
                        <i class="fas fa-id-card" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="no_ktp" placeholder="No. KTP..." required 
                            style="width: 100%; padding: 10px 16px 10px 45px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none;">
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #1e2d6b; margin-bottom: 5px;">Password</label>
                <div style="position: relative;">
                    <i class="fas fa-lock" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="password" name="password" placeholder="Password..." required
                        style="width: 100%; padding: 10px 16px 10px 45px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none;">
                </div>
            </div>

            <button type="submit" style="width: 100%; background: #2d4499; color: white; padding: 12px; border: none; border-radius: 10px; font-weight: 700; font-size: 15px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 10px;">
                <i class="fas fa-user-plus"></i> Register
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 13px; color: #64748b;">
            Sudah punya akun? <a href="{{ route('login') }}" style="color: #2d4499; font-weight: 700; text-decoration: none;">Login</a>
        </p>
    </div>
</x-layouts.guest>