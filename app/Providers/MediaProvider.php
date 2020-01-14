<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Media;
use Image;
use File;
use Uuid;

class MediaProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // parent::boot();
    }

    /**
     * Put image to destination.
     * One or more images
     * Path to put image
     * Type is image or icon and etc.
     *
     * @return void
     */

    public static function putImages($model, $images, $path, $type, $quantity)
    {
        
        $number = $model->images()->get()->count();
        $difference = null;
        $limitedImgs = null;

        if($number < $quantity)
        {
            $difference = $quantity - $number;
            $limitedImgs = array_slice($images,0,$difference);

            foreach ($limitedImgs as $key => $image) 
            {
                $img = Image::make($image->getRealPath());

                $img->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $image_name = $key. '-' .time().'.'.$image->getClientOriginalExtension();

                /*
                ** check if directory exists
                ** if not, create it
                */
                $directory = public_path('/uploads/'. $path);
                if (!file_exists($directory)) 
                {
                    File::makeDirectory($directory, $mode = 0777, true, true);            
                }
                if($directory)
                {
                    /*
                    ** Save image
                    */
                    $img->save(public_path('/uploads/'. $path . '/' .$image_name));
                }

                $model->media()->create([
                    'id'            => (string) Uuid::generate(4),
                    'image_key'     => $type,
                    'image_value'   => $image_name,
                ]);
            }

            $cover = $model->media()->where('image_key', 'cover')->first();

            if(!$cover)
            {
                $model->media()->first()->update(['image_key' => 'cover']);
            }
           
        }
        else{
            \Session::flash('msg', trans('session.you_uploaded_max_img_number'));
            return back();
        }
        
    }

    public static function putLibraryImage($model, $image, $path, $type)
    {
        $img = Image::make($image->getRealPath());

        // $img->resize(800, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         });
        $image_name = time().'.'.$image->getClientOriginalExtension();

        /*
        ** check if directory exists
        ** if not, create it
        */
        $directory = public_path('/uploads/'. $path);
        if (!file_exists($directory)) 
        {
            File::makeDirectory($directory, $mode = 0777, true, true);            
        }
        if($directory)
        {
            /*
            ** Save image
            */
            $img->save(public_path('/uploads/'. $path . '/' .$image_name));
        }

        $model->media()->create([
            'id'            => (string) Uuid::generate(4),
            'media_key'     => $type,
            'media_value'   => $image_name,
        ]);

    }
    public static function putImage($model, $column, $image, $path)
    {
        $img = Image::make($image->getRealPath());

        // $img->resize(800, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         });
        $image_name = time().'.'.$image->getClientOriginalExtension();

        /*
        ** check if directory exists
        ** if not, create it
        */
        $directory = public_path('/uploads/'. $path);
        if (!file_exists($directory)) 
        {
            File::makeDirectory($directory, $mode = 0777, true, true);            
        }
        if($directory)
        {
            /*
            ** Save image
            */
            $img->save(public_path('/uploads/'. $path . '/' .$image_name));
        }
        if($model->$column != null){
            $existedImg = public_path('/uploads/'. $path . '/' .$model->$column);
            File::delete($existedImg);
        }
        $model->$column = $image_name;
        $model->save();

        // $model->media()->create([
        //     'id'            => (string) Uuid::generate(4),
        //     'media_key'     => '',
        //     'media_value'   => $image_name,
        // ]);

    }

    public static function deleteImages($model, $path){

        $images = $model->media()->get();
        
        if(count($images))
        {
            foreach ($images as $key => $image) 
            {
                $fullPath = '/uploads/' . $path . '/'. $image->image_value;
                File::delete(public_path($fullPath));
                $image->delete();
            }
        }

    }
    public static function deleteImage($model, $column, $path){
        $image = null;
        if($model->{$column}){
            $image = '/uploads/' . $path . '/'. $model->{$column};
        }
        if($image)
        {
            File::delete(public_path($image));
        }

    }
    public static function deleteLibraryImage($id, $path){

        $image = Images::find($id);

        if($image)
        {
            $fullPath = '/uploads/' . $path . '/'. $image->image_value;
            File::delete(public_path($fullPath));
            $image->delete();
        }

    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
