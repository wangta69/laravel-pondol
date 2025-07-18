<nav id="sidebar">
  <div class="sidebar-header">
    <h3><a href="#">{{ config('app.name', 'OnStory') }}</a></h3>
    <strong>ON</strong>
  </div>

  <ul class="list-unstyled components" id="navbar-sidebar">
    @foreach($items as $item)
      <x-dynamic-component :component="$item->component" />   
    @endforeach
  </ul>
</nav>
