<x-dynamic-component 
  :component="'pondol-common::common-admin'" 
  :path="['환경설정']"> 

  
  <div id="content">
    <h2 class='title'>관리자 Lnb 설정</h2>
    <div class="card">
      <div class="card-header">List</div>
      <div class="card-body">
        <table class='table table-striped'>
          <colgroup>
              <col width='50' />
              <col width='50' />
              <col width='*' />
              <col width='*' />
              <col width='50' />
              <col width='50' />
          </colgroup>
          <thead>
            <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>type</th>
              <th class='text-center'>title</th>
              <th class='text-center'>component</th>
              <th class='text-center'>order</th>
              <th class='text-center'></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($items as $index => $item)
              <tr class="data-row" user-attr-menu-id="{{$item->id}}">
                  <td class='text-center'>
                      {{ $index + 1 }}
                  </td>
                  <td class='text-center'>
                      {{ $item->type }}
                  </td>
                  <td class='text-center'>
                      {{ $item->title }}
                  </td>
                  <td class='text-center'>
                      {{ $item->component }}
                  </td>
                  <td class='text-center'>
                      
                      <input type="text" class="form-control act-order"  placeholder="" value="{{ $item->order }}">
                  </td>
                  <td class='text-center'>
                    @if(!$item->is_default)
                      <button type="button" class="btn btn-danger btn-sm act-delete">Delete</button>
                    @endif
                  </td>
              </tr>
              @endforeach
          </tbody>
         </table>
      </div>
    </div>

    <form method="POST" action="{{route('common.admin.menu.store') }}" class="form-horizontal">
      @csrf 
      <div class="card mt-3">
        <div class="card-header">Lnb 만들기</div>
        <div class="card-body">
          
          <div class="form-group row mt-1">
            <label for="name" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title" id="title" placeholder="" value="">
            </div>
          </div>

          <div class="form-group row mt-1">
            <label for="table_name" class="col-sm-2 control-label">Component</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="component" id="component" placeholder="" value="">
            </div>
          </div>

          <div class="form-group row mt-1">
            <label for="table_name" class="col-sm-2 control-label">Order</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="order" id="order" placeholder="" value="">
            </div>
          </div>
          
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary" role="button">Create</button>
        </div>
      </div>
    </form>
  </div><!-- .container -->

@section('scripts')
@parent
<script>
$(function(){

  $(".act-delete").on('click', function(){
    var id = $(this).parents('tr').attr('user-attr-menu-id');
    ROUTE.ajaxroute('put', 
    {route: 'common.admin.menu.destroy', segments: [id]}, 
    function(resp) {
      if(resp.error) {
        showToaster({title: '알림', message: resp.error});
      } else {
        window.location.reload();
      }
    })
  })

  $(".act-order").on('blur', function(){
    var id = $(this).parents('tr').attr('user-attr-menu-id');
    var order = $(this).val();
    
    
    ROUTE.ajaxroute('put', 
    {route: 'common.admin.menu.order', segments: [id], data: {order: order}}, 
    function(resp) {
      if(resp.error) {
        showToaster({title: '알림', message: resp.error});
      } else {
        window.location.reload();
      }
    })
  })
})

</script>
@endsection
</x-dynamic-component>