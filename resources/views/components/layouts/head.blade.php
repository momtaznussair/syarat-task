<head>
    <title>
        {{ $title ?? 'Syaaraat PHP Task' }}
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- begin::Fonts(mandatory for all pages) --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    {{-- end::Fonts --}}
    {{-- begin::Vendor Stylesheets(used for this page only) --}}
    <link href="{{ @asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- end::Vendor Stylesheets --}}
    {{-- begin::Global Stylesheets Bundle(mandatory for all pages) --}}
    <link href="{{ @asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- end::Global Stylesheets Bundle --}}
    @livewireStyles
</head>