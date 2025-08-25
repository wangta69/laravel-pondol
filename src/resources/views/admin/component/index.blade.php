<x-dynamic-component 
  :component="'pondol-common::common-admin'" 
  :path="['환경설정', '컴포넌트 활성']"> 
  
  <div id="content">
    <h2 class='title'>컴포넌트 활성</h2>
    <div class="card">
      <div class="card-header">List</div>
      <div class="card-body">
        <table class='table table-striped'>
          <colgroup>
            <col width='50' />
            <col width='150' />
            <col width='*' />
            <col width='80' />
          </colgroup>
          <thead>
            <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>컴포넌트</th>
              <th class='text-center'>github</th>
              <th class='text-center'></th>
            </tr>
          </thead>
          <tbody>

            <tr class="data-row">
              <td class='text-center'>
                1
              </td>
              <td class='text-center'>
                  Laravel Auth
              </td>
              <td class='text-center'>
                <a href="https://github.com/wangta69/laravel-auth" target="_new">ttps://github.com/wangta69/laravel-auth</a>
              </td>

              <td class='text-center'>
                <a class="btn btn-danger btn-sm act-delete" href="{{ route('common.admin.component.activate', ['auth']) }}">활성화</a>
              </td>
            </tr>
            <tr class="data-row">
              <td class='text-center'>
                2
              </td>
              <td class='text-center'>
                Laravel Board
              </td>
              <td class='text-center'>
                <a href="https://github.com/wangta69/laravel_board" target="_new">ttps://github.com/wangta69/laravel_board</a>
              </td>
              <td class='text-center'>
                <a class="btn btn-danger btn-sm act-delete" href="{{ route('common.admin.component.activate', ['bbs']) }}">활성화</a>
              </td>
            </tr>
            <tr class="data-row">
              <td class='text-center'>
                3
              </td>
              <td class='text-center'>
                Laravel Chart
              </td>
              <td class='text-center'>
                <a href="https://github.com/wangta69/laravel-chart" target="_new">ttps://github.com/wangta69/laravel-chart</a>
              </td>
              <td class='text-center'>
                <a class="btn btn-danger btn-sm act-delete" href="{{ route('common.admin.component.activate', ['chart']) }}">활성화</a>
              </td>
            </tr>
          </tbody>
         </table>
      </div>
    </div>
  </div><!-- .container -->
</x-dynamic-component>