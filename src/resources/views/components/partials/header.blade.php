
<div class="container d-flex justify-content-between font-size-12" id="header-top">
  <div></div>
  <menu>
    <li></li>
    <li></li>     
  </menu>
</div>

@section('styles')
@parent
<style>
#header-top {
  padding: 5px;
}
#header-top menu {
  position: relative;
}

#header-top menu li {
  position: relative;
  float: left;
  list-style: none;
  padding-right: 9px;
}
</style>
@endsection

