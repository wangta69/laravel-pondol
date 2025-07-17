<nav id="sidebar">
  <div class="sidebar-header">
    <h3><a href="#">OnStory</a></h3>
    <strong>ON</strong>
  </div>

  <ul class="list-unstyled components" id="navbar-sidebar">
    @foreach($items as $item)
        @if($item['key'] === 'lnb.enable.pondol-bbs')
          <x-dynamic-component :component="config('pondol-bbs.component.admin.lnb')" />   
        @endif
    
    @endforeach
  </ul>
</nav>
