<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            * {
                font-family: 'Poppins', sans-serif;
            }
            /* ===== PASTEL LIGHT MODE PALETTE ===== */
            html:not(.dark) body,
            html:not(.dark) .bg-gray-100 {
                background-color: #EEE9E1 !important;
            }
            html:not(.dark) .bg-white {
                background-color: #FDFAF6 !important;
            }
            html:not(.dark) .bg-gray-50 {
                background-color: #F5F1EB !important;
            }
            html:not(.dark) .border-gray-100 { border-color: #DDD8CF !important; }
            html:not(.dark) .border-gray-200 { border-color: #D4CFC7 !important; }
            html:not(.dark) .divide-gray-200 > * + * { border-color: #DDD8CF !important; }
            html:not(.dark) input[type="text"],
            html:not(.dark) input[type="email"],
            html:not(.dark) input[type="password"],
            html:not(.dark) select,
            html:not(.dark) textarea {
                background-color: #F5F1EB !important;
                border-color: #C8C3BB !important;
            }
            html:not(.dark) input:focus,
            html:not(.dark) select:focus,
            html:not(.dark) textarea:focus {
                background-color: #FDFAF6 !important;
                border-color: #16a34a !important;
                box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12) !important;
            }
            html:not(.dark) table thead tr,
            html:not(.dark) table thead th {
                background-color: #EDE8E0 !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
