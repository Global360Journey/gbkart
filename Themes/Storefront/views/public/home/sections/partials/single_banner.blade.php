<a href="{{ $banner->call_to_action_url }}" class="banner {{ $class }}" style="background-image: url({{ $banner->image->path }});" {{ $banner->open_in_new_window ? '_blank' : '_self' }}>
    <div class="overlay"></div>

    <div class="display-table">
        <div class="display-table-cell">
            <div class="banner-content">
                <h2>{{ $banner->caption_1 }}</h2>
                <p>{{ $banner->caption_2 }}</p>
                <span class="btn btn-primary">{{ $banner->call_to_action_text }}</span>
            </div>
        </div>
    </div>
</a>
