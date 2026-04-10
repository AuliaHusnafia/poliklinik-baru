<x-layouts.guest title="Login">
    <div style="background: white; padding: 40px; border-radius: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 100%; max-width: 400px;">   
        
        <div style="text-align: center; margin-bottom: 32px;">
            <div style="width: 64px; height: 64px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                <img src="{{ asset('images/logo-bengkot.png') }}" alt="Logo" style="width: 40px;">
            </div>
            <h2 style="font-size: 24px; font-weight: 800; color: #1e2d6b; margin-bottom: 4px;">Poliklinik</h2>
            <p style="color: #64748b; font-size: 14px;">Masuk ke akun Anda</p>
        </div>

        <form action="{{ route('login.submit') }}" method="POST">
    @csrf
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: #1e2d6b; margin-bottom: 8px;">Email</label>
                <div style="position: relative;">
                    <i class="fas fa-envelope" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="email" name="email" placeholder="Masukkan email..." required 
                        style="width: 100%; padding: 12px 16px 12px 48px; border: 1.5px solid #e2e8f0; border-radius: 12px; font-size: 14px; outline: none; transition: all 0.2s;"
                        onfocus="this.style.borderColor='#2d4499'; this.style.boxShadow='0 0 0 3px rgba(45, 68, 153, 0.1)'"
                        onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'">
                </div>
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: #1e2d6b; margin-bottom: 8px;">Password</label>
                <div style="position: relative;">
                    <i class="fas fa-lock" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="password" name="password" placeholder="Masukkan password..." required
                        style="width: 100%; padding: 12px 16px 12px 48px; border: 1.5px solid #e2e8f0; border-radius: 12px; font-size: 14px; outline: none; transition: all 0.2s;"
                        onfocus="this.style.borderColor='#2d4499'; this.style.boxShadow='0 0 0 3px rgba(45, 68, 153, 0.1)'"
                        onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'">
                </div>
            </div>

            <button type="submit" style="width: 100%; background: #2d4499; color: white; padding: 14px; border: none; border-radius: 12px; font-weight: 700; font-size: 16px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; transition: background 0.2s;">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <p style="text-align: center; margin-top: 24px; font-size: 14px; color: #64748b;">
            Belum punya akun? <a href="{{ route('register') }}" style="color: #2d4499; font-weight: 700; text-decoration: none;">Register</a>
        </p>
    </div>
</x-layouts.guest>