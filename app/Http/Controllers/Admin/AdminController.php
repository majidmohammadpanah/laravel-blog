<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    protected function uploadImages($file)
    {
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
        $filename = $file->getClientOriginalName();

        if(file_exists(public_path($imagePath) . $filename)) {

            $filename = Carbon::now()->timestamp . $filename;
        }

        $file=$file->move(public_path($imagePath) , $filename);


        $sizes = ["300" , "600" , "900"];
        $url['images'] = $this->resize($file->getRealPath() , $sizes , $imagePath , $filename);
        $url['thumb'] = $url['images']['original'];

        return $url;




    }
    private function resize($path , $sizes , $imagePath , $filename)
    {
        $images['original'] = $imagePath . $filename;

        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $filename;

            Image::make($path)->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));
        }

        return $images;
    }
    public function uploadImagesCkeditor()
    {
        $this->validate(request() , [
            'upload' => 'required|mimes:jpeg,png,gif,webp,bmp',
        ]);

        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";

        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();


        if(file_exists(public_path($imagePath) . $filename)) {

            $filename = Carbon::now()->timestamp . $filename;
        }

        $file->move(public_path($imagePath) , $filename);
        $url = $imagePath . $filename;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
    }
}
