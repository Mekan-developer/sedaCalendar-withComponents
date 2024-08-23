<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $images = Image::orderBy("id")->get();
        return view("admin.gallery", compact("images"));
    }

    public function store(ImageRequest $request){
        $message = 'error, something went wrong!';
        if ($request->hasFile('image')) {
            $images = $request->image;
            $count = 0;
            foreach ($images as $key => $value) {
                $imageName = $this->uploadFile($request->file('image')[$count]);
                Image::create([
                    'image' => $imageName,
                    'status' => $request->status
                ]);
                $count++; 
            }
            $message = 'Images created sccessfully!';
        }
        return redirect()->route('admin.gallery')->with('success',$message);
    }

    public function destroy(Image $image){
        if ($image->image) {
            $this->removeFile($image->image, 'gallery');
        } 
        
        $image->delete();
        return redirect()->back()->with('success','Image deleted successfully');
    }

    public function update(Image $image){
        $image->update(['status'=> !$image->status]);

        return redirect()->back()->with('success','Image status successfully updated');
    }
}
