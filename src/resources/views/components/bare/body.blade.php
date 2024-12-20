<x-pondol-common::app>
  @if(isset($header))
  <x-dynamic-component :component="$header" />
  @endif
  {{ $slot }}

  @if(isset($footer))
  <x-dynamic-component :component="$footer" />
  @endif
  <x-pondol-common::partials.toaster />

  @section('styles')
  @parent
  <link rel="stylesheet" href="/pondol/app.css">
  @endsection

  @section('scripts')
  @parent
  <script src="/pondol/common.js"></script>
  @endsection

</x-pondol-common::app>