<script>
    @if (session()->has('error-message'))
        Toastify({
            text: '{{session('error-message')}}',
            className: "info",
            duration: 15000,
            style: {
                background: "#f14668",
            }
        }).showToast();
    @endif
</script>
