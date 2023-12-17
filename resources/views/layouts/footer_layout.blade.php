<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; @isset($SiteOption)
                {{ $SiteOption[0]->value }}
            @endisset {{ date('Y') }}</span>
        </div>
    </div>
</footer>