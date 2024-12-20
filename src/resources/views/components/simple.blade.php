@php
$path = isset($path) ? $path : [];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>@yield('title', config('app.name', 'OnStory'))</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" href="/pondol/admin.css">
    <style>
      #footer {border-top: 1px solid #ced4da;}
    </style>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.0/jquery-ui.min.js" integrity="sha512-MlEyuwT6VkRXExjj8CdBKNgd+e2H+aYZOCUaCrt9KRk6MlZDOs91V1yK22rwm8aCIsb5Ec1euL8f0g58RKT/Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js" integrity="sha512-CQBWl4fJHWbryGE+Pc7UAxWMUMNMWzWxF4SQo9CgkJIN1kx6djDQZjh3Y8SZ1d+6I+1zze6Z7kHXO7q3UyZAWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/pondol/date-select.js"></script>
  </head>
  <body>

    <div class="wrapper">
      <x-dynamic-component :component="$navigation" />
      <div class="container">

      <x-pondol-common::main-top-navigation :path="$path"/>
        {{ $slot }}
        <footer class="mt-5 p-3 text-end" id="footer">
          Copyright 2024. onstory.fun. All Rights Reserved.
        </footer>
      </div><!--. container -->
    </div>

    <!-- toaseer box start -->
    <div class="bg-body-secondary position-relative bd-example-toasts rounded-3">
      <div class="toast-container  position-fixed bottom-0 end-0 p-3" id="toast-container">
      </div>
    </div>
    <!-- toaseer box end -->
    <!-- toaseer toast-placement start -->
    <div id="toast-placement">
    <!--   <div class="toast toast-placement" role="status" aria-live="polite" aria-atomic="true" > -->
      <div class="toast toast-placement" role="alert" aria-live="assertive" aria-atomic="true" >
        <div class="toast-header">
          <strong class="me-auto"></strong>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>

        <div class="toast-body">
          
        </div>
        <div class="toast-footer text-end d-none">
          <button class="btn btn-sm act-toast-to">바로가기</button>
        </div>
      </div>
    </div>
    <!-- toaseer toast-placement end -->
  </body>
  @yield('scripts')
</html>
