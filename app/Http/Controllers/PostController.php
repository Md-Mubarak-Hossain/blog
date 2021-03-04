<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function writePost(){
        $category = DB::table('categories')->get();
        return view('post.writepost',compact('category'));
    }

    public function StorePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:25|min:4',
            'details' => 'required|max:2225|min:4',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if($image){
            $image_name = str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->Move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);


        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function Allpost(){
        $post=DB::table('posts')->get();
        return view('post.allpost',compact('post'));
    }
}
