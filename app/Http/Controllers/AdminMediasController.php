<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;

class AdminMediasController extends Controller
{
    //
   public function index(){

    $photos = Photo::all();

    return view('admin.medias.index',compact('photos'));

   }

   public function create(){
    return view('admin.medias.create');
   }

   public function store(Request $request){

    $files = $request->file('file');
    $names = time() . $files->getClientOriginalName();
    $files->move('images',$names);
    Photo::create(['file'=>$names]);

    return redirect()->back();
   }


   public function destroy($id){
      Photo::findOrFail($id)->delete();
   }

   public function deleteMedia(Request $request){


      if(isset($request->delete_single)){
        $this->destroy($request->photo);
      }

      if(isset($request->delete_all) && !empty($request->checkBoxArray)){
       $photos = Photo::findOrFail($request->checkBoxArray);

       foreach($photos as $photo){
         $photo->delete();
       }

      }

       return redirect()->back();


 }



}
