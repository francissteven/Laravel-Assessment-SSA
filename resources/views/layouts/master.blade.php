<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css">
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
</head>
<body class="sb-nav-fixed">
    @include('dashboard.layouts.header')
    <div id="layoutSidenav">
        @include('dashboard.layouts.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
                {{-- TOASTER --}}
                <div aria-live="polite" aria-atomic="true" class="position-relative">
                    <div class="toast-container p-3" id="toastPlacement" style="position: fixed; top: 0; right: 0; z-index: 1050;">
                        @if(session('success'))
                            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <strong class="me-auto">Success</strong>
                                    <small>Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </main>
            @include('dashboard.layouts.footer')
        </div>
    </div>
    {{-- TOASTER SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl, { delay: 5000 });
            });
            toastList.forEach(toast => toast.show());
        });
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script> --}}
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
</body>
</html>
