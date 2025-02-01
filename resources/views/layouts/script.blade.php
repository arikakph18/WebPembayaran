<!-- Pastikan tema diinisialisasi lebih dulu -->
<script src="{{ asset('template/assets/static/js/initTheme.js') }}"></script>
<script src="{{ asset('template/assets/static/js/components/dark.js') }}"></script>

<!-- Load library eksternal -->
<script src="{{ asset('template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!-- <script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script> -->

<!-- Load skrip utama aplikasi -->
<script src="{{ asset('template/assets/compiled/js/app.js') }}"></script>
<!-- <script src="{{ asset('template/assets/static/js/pages/dashboard.js') }}"></script> -->

<!-- Fungsi Logout -->
<script>
    function logout() {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>
