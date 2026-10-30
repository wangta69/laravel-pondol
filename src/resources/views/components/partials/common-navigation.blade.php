{{-- src/resources/views/components/partials/common-navigation.blade.php --}}
<nav id="sidebar">
    <!-- 1. 로고 헤더 -->
    <div class="sidebar-header">
        <h3><a href="{{ $adminHome }}"><i
                    class="fas fa-layer-group me-2 text-primary"></i>{{ config('app.name', 'OnStory') }}</a></h3>
        <strong><a href="{{ $adminHome }}">ON</a></strong>
    </div>

    <!-- 2. 동적 패키지 메뉴 목록 (스크롤 영역) -->
    <div class="sidebar-menu-body">
        <ul class="list-unstyled components" id="navbar-sidebar">
            @foreach ($items as $item)
                <x-dynamic-component :component="$item->component" />
            @endforeach
        </ul>
    </div>

    <!-- 3. LNB 하단 고정 가이드 영역 -->
    <div class="sidebar-footer">
        <a href="{{ route('common.admin.ui-guide.index') }}"
            class="btn btn-dark w-100 d-flex align-items-center justify-content-center py-2"
            style="font-size: 0.85rem; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1);">
            <i class="fas fa-palette me-2 text-warning"></i>
            <span>UI / CSS 사용 가이드</span>
        </a>
    </div>
</nav>
