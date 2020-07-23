<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageHandlerController extends Controller
{
    public function upload(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if($request->file('image')!=null){
            $path = $request->file('image')->store('images');
        }
        else{
            return "There was an error uploading your file.";
        }

        return url($path);

    }

    public function delete(Request $request){
        $image = $request->src;
        $exists = Storage::disk('images')->exists($image);
        if($exists){
            $deleted = Storage::disk('images')->delete('/'.$image);
            if(!$deleted){
                return "Cannot delete the file.";
            }
            return "File Delete Successfully";
        }

        return "File does not exist";
    }
}
