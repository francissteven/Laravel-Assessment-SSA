@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
@include('dashboard.content')
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, { delay: 5000 });
        });
        toastList.forEach(toast => toast.show());
    });
</script>
@endsection
