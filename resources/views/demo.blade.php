{{-- <link rel="stylesheet" href="{{ asset('asset/toast-alert/toastr.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.css') }}">

<link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/extensions/toastr.css') }}">
<script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset/admin/vendors/js/extensions/toastr.min.js') }}"></script>
{{-- <script src="{{ asset('asset/toast-alert/toastr.js') }}"></script> --}}

<button onclick="demo()">Click</button>

<script>
    function demo() {
        toastr.error('111')
    }
</script>
