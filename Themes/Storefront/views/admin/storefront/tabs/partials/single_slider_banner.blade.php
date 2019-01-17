<div class="single-banner slider-banner">
    <div class="banner-header">
        <h5>{{ trans("storefront::storefront.form.banner_{$bannerNumber}") }}</h5>
    </div>

    <div class="banner-body">
        <div class="banner-image">
            @if (is_null($banner->image->path))
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <img class="hide">
            @else
                <img src="{{ $banner->image->path }}">
            @endif

            <input type="hidden" name="storefront_slider_banner_{{ $bannerNumber }}_file_id" value="{{ $banner->image->id }}" class="banner-file-id">
        </div>

        <div class="banner-content clearfix">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="form-group">
                        <label for="slider-banner-{{ $bannerNumber }}-caption-1">{{ trans("storefront::attributes.caption_1") }}</label>
                        <input type="text" name="translatable[storefront_slider_banner_{{ $bannerNumber }}_caption_1]" value="{{ $banner->caption_1 }}" class="form-control" id="slider-banner-{{ $bannerNumber }}-caption-1">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="form-group">
                        <label for="slider-banner-{{ $bannerNumber }}-caption-2">{{ trans("storefront::attributes.caption_2") }}</label>
                        <input type="text" name="translatable[storefront_slider_banner_{{ $bannerNumber }}_caption_2]" value="{{ $banner->caption_2 }}" class="form-control" id="slider-banner-{{ $bannerNumber }}-caption-2">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="form-group">
                        <label for="slider-banner-{{ $bannerNumber }}-url">{{ trans("storefront::attributes.url") }}</label>
                        <input type="text" name="storefront_slider_banner_{{ $bannerNumber }}_url" value="{{ $banner->url }}" class="form-control" id="slider-banner-{{ $bannerNumber }}-url">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="checkbox">
                        <input type="hidden" name="storefront_slider_banner_{{ $bannerNumber }}_open_in_new_window" value="0">
                        <input type="checkbox" name="storefront_slider_banner_{{ $bannerNumber }}_open_in_new_window" value="1" id="slider-banner-{{ $bannerNumber }}-open-in-new-window" {{ $banner->open_in_new_window ? 'checked' : '' }}>
                        <label for="slider-banner-{{ $bannerNumber }}-open-in-new-window">
                            {{ trans("storefront::attributes.open_in_new_window") }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
