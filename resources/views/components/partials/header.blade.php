<div style="margin-bottom: 24px;">

    {{-- BARIS ATAS: BREADCRUMB + USER --}}
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
        
        {{-- BREADCRUMB --}}
        @if(isset($breadcrumbs))
        <div style="font-size: 0.85rem; display:flex; align-items:center; gap:6px; color:#64748b;">
            @foreach($breadcrumbs as $item)
                @if(!$loop->last)
                    <span>{{ $item }}</span>
                    <i class="fas fa-chevron-right" style="font-size:10px;"></i>
                @else
                    <span style="color:#1e293b; font-weight:600;">{{ $item }}</span>
                @endif
            @endforeach
        </div>
        @endif

        {{-- USER INFO --}}
        <div style="display:flex; align-items:center; gap:10px;">
            
            <div style="text-align:right;">
                <div style="font-size: 0.85rem; font-weight:600; color:#1e293b;">
                    {{ auth()->user()->name ?? 'Admin' }}
                </div>
                <div style="font-size: 0.7rem; color:#64748b;">
                    Administrator
                </div>
            </div>

            <div style="
                width:40px;
                height:40px;
                background:#1e3a8a;
                color:white;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                font-weight:bold;
            ">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>

        </div>

    </div>

    {{-- BARIS BAWAH: TITLE + BUTTON --}}
    <div style="display:flex; justify-content:space-between; align-items:center;">
        
        {{-- TITLE --}}
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">
            {{ $title ?? 'Dashboard' }}
        </h2>

        {{-- BUTTON SLOT --}}
        <div>
            {{ $slot }}
        </div>

    </div>

</div>