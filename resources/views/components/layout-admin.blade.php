<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="description" content="qui descrizione">

<title>{{ config('app.name', 'My title') }} - @yield('title')</title>

@livewireStyles
@livewireScripts
@vite([
    'resources/sass/vendor.scss',
    'resources/sass/app.scss',
    'resources/js/index.js',
])
</head>
<body>
<div @class(['container'])>
    <x-header-admin/>
    {{ $slot }}
</div>
</body>
</html>
