<?php

namespace App\Listeners;

use App\Settings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;

class ImageUploadListener
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
     * @param  ImageWasUploaded  $event
     * @return void
     */

    public function handle(ImageWasUploaded $event)
     {

        $path = str_replace(base_path()."\\", "", $event->path());
        $path = str_replace('app\public', '', $path);

        $img = Image::make($path);

        $height = $img->height();

        $width = $img->width();
          
        //resize
        if($width > $height) {
        $img->resize(720, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 50);
        } else {
            $img->resize(null, 450, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 50);
        }

        //watermark 'uploads/img/psygarnij.png'
        $siteSettings = Settings::findOrFail(1);
        if(Storage::exists($siteSettings->watermark)) {
            //storage/uploads/img/psygarnij.png
            $watermark = Image::make('storage/'.$siteSettings->watermark);

            $img->insert($watermark, 'bottom-right', 10, 10);
        }

        //save
        $img->save($path);
     }
}
