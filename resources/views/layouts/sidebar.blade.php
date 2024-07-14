<div>
    <div class="sidebar-heading"><h5>Menu</h5></div>
    <div class="list-group list-group-flush">
        <a href="{{ route('arsip.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('arsip.index') ? 'active' : '' }}">
            <i class="fas fa-solid fa-star"></i> Arsip
        </a>
        <a href="{{ route('kategori.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('kategori.index') ? 'active' : '' }}">
            <i class="fas fa-asterisk"></i> Kategori Surat
        </a>
        <a href="{{ route('about.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('about.index') ? 'active' : '' }}">
            <i class="fas fa-info-circle"></i> About
        </a>
    </div>
</div>
