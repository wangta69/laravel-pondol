<x-pondol-common::app>
  @if(isset($header))
  <x-dynamic-component :component="$header" />
  @endif
  {{ $slot }}

  <x-pondol-common::partials.footer />
  <x-pondol-common::partials.toaster />

@section('styles')
@parent
<style>
#footer {
  border-top: 1px solid #ced4da;
  position: fixed;
  bottom: 0;
  width: 100%;
}
</style>
@endsection

@section('scripts')
@parent
@endsection

</x-pondol-common::app>