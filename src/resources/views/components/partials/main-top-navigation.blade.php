{{-- src/resources/views/components/partials/main-top-navigation.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info text-white">
            <i class="fas fa-align-left"></i>
            <span></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- BS5 규격: ml-auto -> ms-auto 로 수정하여 우측 정렬 정상화 --}}
            <ul class="nav navbar-nav ms-auto align-items-center">
                {{-- 홈 아이콘 링크 (첫 머리에 홈 아이콘 표시) --}}
                <li class="nav-item">
                    <a class="nav-link py-1 px-2"
                        href="{{ url(request()->segment(1) === 'admin' ? 'admin' : (request()->segment(2) === 'admin' ? request()->segment(1) . '/admin' : '/')) }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>

                @foreach ($path as $k => $v)
                    <li class="nav-item d-flex align-items-center text-muted">
                        <span class="mx-1 text-secondary" style="font-size: 0.8em;"><i
                                class="fas fa-chevron-right"></i></span>
                        <span class="nav-link py-1 px-2 {{ $loop->last ? 'fw-bold text-dark' : 'text-muted' }}">
                            {{ $v }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
