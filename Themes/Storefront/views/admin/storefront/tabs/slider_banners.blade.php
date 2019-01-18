<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="banner-image-wrapper">
            @foreach ($banners as $bannerNumber => $banner)
                @include('admin.storefront.tabs.partials.single_slider_banner')
            @endforeach
        </div>
    </div>
</div>
