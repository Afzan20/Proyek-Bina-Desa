<!-- Footer -->
<footer class="footer pt-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4 text-center text-sm text-muted text-lg-start">
                © <script>document.write(new Date().getFullYear())</script>, Bina Desa
            </div>
        </div>
    </div>
</footer>

<!-- Core JS -->
<script src="{{ asset('assets-template/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets-template/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets-template/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets-template/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets-template/js/soft-ui-dashboard.min.js') }}"></script>

@stack('scripts')
