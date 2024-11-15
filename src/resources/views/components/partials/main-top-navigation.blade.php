<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <button type="button" id="sidebarCollapse" class="btn btn-info">
      <i class="fas fa-align-left"></i>
      <span></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav ml-auto">
        @foreach($path as $k => $v)
        <li class="nav-item">
          <a class="nav-link"> @if($k != 0 ) > @endif {{$v}}</a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>