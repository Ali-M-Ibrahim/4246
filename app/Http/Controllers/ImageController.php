<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        return view('uploadimage');
    }

    public function method1(Request $request){
        if($request->hasFile('myfile')){
            // getting the name of the image
            $originalName = $request->file('myfile')->getClientOriginalName();
            // renaming the image and add timestamp
            $fileName = time() .'-'.$originalName;
            //upload image to public folder under subfolder named images
            $request->file('myfile')->move('images',$fileName);
            //creating a new row in database
            $data = new Image();
            $data->name=$originalName;
            $data->path= 'images/'.$fileName;
            $data->save();
            return "ok image uploaded";
        }else{
            return "missing image/ encoding type";
        }
    }

    public function display($id){
        $data = Image::find($id);
        return view('displayimage')->with('data',$data);
    }

    public function method2(Request $request){
        if($request->hasFile('myfile')){
            // getting the name of the image
            $originalName = $request->file('myfile')->getClientOriginalName();
            // renaming the image and add timestamp
            $fileName = time() .'-'.$originalName;
            //upload image to public folder under subfolder named images in storage
            $request->file('myfile')->storeAs('images2',$fileName,'public');
            //creating a new row in database
            $data = new Image();
            $data->name=$originalName;
            $data->path= 'storage/images2/'.$fileName;
            $data->save();
            return "ok image uploaded";
        }else{
            return "missing image/ encoding type";
        }
    }

    public function method3(Request $request){
        if($request->hasFile('myfile')){
            // getting the name of the image
            $originalName = $request->file('myfile')->getClientOriginalName();
            //upload image to public folder under subfolder named images in storage
            $fileName= $request->file('myfile')->store('images3','public');
            //creating a new row in database
            $data = new Image();
            $data->name=$originalName;
            $data->path= 'storage/'.$fileName;
            $data->save();
            return "ok image uploaded";
        }else{
            return "missing image/ encoding type";
        }
    }
}
