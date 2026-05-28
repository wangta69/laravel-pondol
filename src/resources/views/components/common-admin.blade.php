{{-- src/resources/views/components/common-admin.blade.php --}}
@php
    $path = isset($path) ? $path : [];
@endphp
<x-pondol-common::app>
    @section('title', $title ?? '')
    <div class="wrapper">
        <x-common-navigation />

        {{-- ID content 추가하여 사이드바와 분리된 영역 명시 --}}
        <div id="content" class="container-fluid p-0">
            @if (count($path))
                <x-pondol-common::partials.main-top-navigation :path="$path" />
            @endif

            <div class="px-3"> {{-- 내부 여백 확보 --}}
                {{ $slot }}
            </div>

            <div class="px-3 mt-5">
                <x-pondol-common::partials.footer />
            </div>
        </div>
    </div>

    <x-pondol-common::partials.toaster />

    @section('styles')
        @parent
        <link rel="stylesheet" href="/pondol/app.css?v={{ filemtime(public_path('pondol/app.css')) }}">
        <link rel="stylesheet" href="/pondol/admin.css?v={{ filemtime(public_path('pondol/admin.css')) }}">
        <style>
            #footer {
                border-top: 1px solid #ced4da;
            }
        </style>
    @endsection

    @section('scripts')
        @parent
        <script src="/pondol/common.js?v={{ filemtime(public_path('pondol/common.js')) }}"></script>
        <script src="{{ asset('pondol/common-admin.js') }}?v={{ filemtime(public_path('pondol/common-admin.js')) }}" defer>
        </script>
    @endsection
</x-pondol-common::app>
