<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    

    // create 

    public function create(){
        $category = DB::table('categories')->get();
        return view('post.create',compact('category'));
    }

    // store 

    public function store(Request $request){

        $request->validate([
            'title' => 'required|unique:posts|max:50|min:4',
            'description' => 'required|min:4',
            'image' => 'required | mimes:jpeg,jpg,png,JPG,JPEG,PNG',
        ]);


        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        // image upload part 
        $image=$request->file('image'); //ইমেজ ধরব এখানে input এর নাম image 

            if($image){

                // ডাটা ফোল্ডার এ ইন্সারট করার জন্য 

                $image_name = hexdec(uniqid()); // একটা random নামের জন্য ।
                $ext = strtolower($image->getClientOriginalExtension()); // member function সকল ডাটা ছোট হাতের করার জন্য ।
                $image_full_name = $image_name.'.'.$ext; //conket কিংবা যোগ করার জন্য ।
                $upload_path = 'public/frontend/image/' ;  // Image Path , অবশ্যই শেষে '/' দিতে হবে ।
                $image_url = $upload_path.$image_full_name; // Image url টা আপলোড করে url store করে দিলাম ।
                $success=$image->move($upload_path,$image_full_name); //Image path দিয়ে , image er ফুল্ল নাম দিয়ে move করলাম ।

                $data['image'] = $image_url; //$data['image'] হল ডাটাবেস এর ফিল্ড , $image_url holo iage path dekhano .
                

                DB::table('posts')->insert($data); //posts টেবিলে ডাটা ইন্সারট হল
                //notification এর জন্য 
                $notification = array(
                    'message'=>'Successfully Data Inserted',
                    'alert-type'=>'success'
                );
                return Redirect()->route('AllPost')->with($notification);

            }else{
                // যদি আমার ইমেজ না দেওয়া হয় তাহলে ডাটা আপলোড হবে 
                DB::table('posts')->insert($data); //posts টেবিলে ডাটা ইন্সারট হল
                //notification এর জন্য 
                $notification = array(
                    'message'=>'Successfully Data Inserted',
                    'alert-type'=>'success'
                );
                return Redirect()->route('AllPost')->with($notification); //redirect(পেইজ এর নাম)
            
            }
            
        
    }

    // Post Data Show  
    public function index(){
       $post = DB::table('posts') // আমরা যেই টেবিল এ ডাটা আনব  এখানে ওঁই টেবিল টা দিব ।। 
            ->join('categories','posts.category_id','categories.id') //join করব । first paramiter হল যেই টেবিল থেকে ডাটা আনব ,২য় paramiter হল কোন ফিল্ড এর জন্য ডাটা আনব , ৩য় paramiter হল আমরা কি ফিল্ড ধরে ডাটা আনব ।
            //এইখানে posts.category_id ফরেন কি হিসেবে ব্যবহার করছি categories এর id কে
            ->select('posts.*','categories.name') // এখানে posts টেবিল এর সকল ডাটা * দিয়ে সিলেক্ট করা হয়েছে এবং categories এর name field টা select করা হয়েছে । যদি আমরা আরও ফিল্ড নিতে চাই তাহলে এইভাবে ই নিতে হবে ।
            ->get();
            // return response($post);
            return view ('post.index',compact('post'));
    }




    // view Post controller 

    public function viewPost($id){
        // dd($id);
        $post = DB::table('posts')
                ->join('categories','posts.category_id','categories.id')
                ->where('posts.id',$id)
                ->select('posts.*','categories.name')
                ->first();
                // dd($post);
                return view ('post.view',compact('post'));
    }
}
