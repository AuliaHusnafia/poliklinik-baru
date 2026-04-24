<div style="margin-bottom: 24px;">

   <div style="margin-bottom: 24px;">

    {{-- BREADCRUMB
    @if(isset($breadcrumbs))
    <div style="font-size: 0.85rem; display:flex; align-items:center; gap:6px; color:#64748b; margin-bottom:8px;">
        @foreach($breadcrumbs as $item)
            @if(!$loop->last)
                <span>{{ $item }}</span>
                <i class="fas fa-chevron-right" style="font-size:10px;"></i>
            @else
                <span style="color:#1e293b; font-weight:600;">{{ $item }}</span>
            @endif
        @endforeach
    </div>
    @endif --}}

    {{-- TITLE + BUTTON --}}
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">
            {{ $title ?? 'Dashboard' }}
        </h2>
        <div>
            {{ $slot }}
        </div>
    </div>

</div>

</div>