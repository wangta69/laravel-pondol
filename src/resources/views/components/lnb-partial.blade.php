    <hr>
    <li>
      <a href="#bbs-sub-menu" data-bs-toggle="collapse" 
        aria-expanded="{{ request()->routeIs(['bbs*']) ? 'true' : 'false' }}"
        class="dropdown-toggle">
          <i class="fas fa-copy"></i>
          메뉴설정
      </a>

      
      <ul class="collapse list-unstyled {{ request()->routeIs(['common.admin*']) ? 'show' : '' }}" id="bbs-sub-menu">
        

        <li class="{{ request()->routeIs(['common.admin.menu.index']) ? 'current-page' : '' }}">
          <a href="{{ route('common.admin.menu.index') }}">Lnb 설정</a>
        </li>
        <li class="{{ request()->routeIs(['common.admin.component.index']) ? 'current-page' : '' }}">
          <a href="{{ route('common.admin.component.index') }}">컴포넌트 세팅</a>
        </li>
      </ul>
    </li>
