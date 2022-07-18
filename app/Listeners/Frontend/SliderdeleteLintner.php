<?php

namespace App\Listeners\Frontend;

use App\Events\Frontend\SliderdeleteEvent;
use App\Models\Admin\Promotion\Slider;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class SliderdeleteLintner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Frontend\SliderdeleteEvent  $event
     * @return void
     */
    public function handle(SliderdeleteEvent $event)
    {
        Cache::forget('sliders');
        Cache::rememberForever('sliders', function(){
            return Slider::latest()->get();
        });
    }
}
