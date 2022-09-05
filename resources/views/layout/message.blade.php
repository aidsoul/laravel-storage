<div class="alert alert-{{ $alertType }} alert-dismissible fade show" role="alert">
    <div>
    @yield('alertBody')
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>