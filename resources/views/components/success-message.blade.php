<script>
    @if (session()->has('success-message'))
        Toastify({
            text: '{{session('success-message')}}',
            className: "info",
            duration: 15000,
            style: {
                background: "#48c78e",
            }
        }).showToast();
    @endif
</script>
