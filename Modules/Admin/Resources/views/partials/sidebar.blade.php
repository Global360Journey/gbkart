<aside class="main-sidebar">
    <header class="main-header clearfix">
        <a class="logo" href="{{ route('admin.dashboard.index') }}">
            <span class="logo-lg">Global360kart</span>
        </a>

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <i aria-hidden="true" class="fa fa-bars"></i>
        </a>
    </header>

    <section class="sidebar">
        {!! $sidebar !!}
    </section>
</aside>
