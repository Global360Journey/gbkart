<?php

namespace Themes\Storefront\Admin;

use Modules\Media\Entities\File;

class SliderBanner
{
    public $caption_1;
    public $caption_2;
    public $url;
    public $open_in_new_window;
    public $image;

    public function __construct($caption_1, $caption_2, $url, $open_in_new_window, $image)
    {
        $this->caption_1 = $caption_1;
        $this->caption_2 = $caption_2;
        $this->url = $url;
        $this->open_in_new_window = $open_in_new_window;
        $this->image = $image;
    }

    public static function all()
    {
        return [
            1 => self::findByNumber(1),
            2 => self::findByNumber(2),
        ];
    }

    public static function findByNumber($bannerNumber)
    {
        return new self(
            setting("storefront_slider_banner_{$bannerNumber}_caption_1"),
            setting("storefront_slider_banner_{$bannerNumber}_caption_2"),
            setting("storefront_slider_banner_{$bannerNumber}_url"),
            setting("storefront_slider_banner_{$bannerNumber}_open_in_new_window"),
            File::findOrNew(setting("storefront_slider_banner_{$bannerNumber}_file_id"))
        );
    }
}
