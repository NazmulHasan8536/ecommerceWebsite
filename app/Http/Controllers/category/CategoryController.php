<?php

namespace App\Http\Controllers\category;


use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){


        $category = DB::table('categories')->get();
        return view('category.index',compact('category'));
    }



    // create 


    public function create(){
        return view('category.create');
    }



    // store 

    public function store(request $Request){

        $Request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'description' => 'required|min:4',
        ]);




        $data = array();

        $data['name'] = $Request->name;
        $data['slug'] = $Request->description;


        $category = DB::table('categories')->insert($data);

// condition 
        if($category){
            $notification = array(
                'message'=>'Successfully Category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('AllCategory')->with($notification); 
        }else{
            $notification = array(
                'message'=>'Something Went wrong',
                'alert-type'=>'Error'
            );
            return Redirect()->back()->with($notification); //redirect(পেইজ এর নাম)
        }
}






    // View Category 



    public function viewCategory($id){
        // dd($id);

        $category = DB::table('categories')->where('id',$id)->first();
        // dd($category);
        return view('category.viewCategory',compact('category'));
    }




    // Delete Category 


    public function deleteCategory($id){
        // dd($id);
        $category = DB::table('categories')->where('id',$id)->delete();

        if($category){
            $notification = array(
                'message' => 'Message is successfully deleted',
                'alert-type' =>'success'
            );
        }


        return back()->with($notification);
    }



    // Edit Category 


    public function editCategory($id){
        // dd($id);
        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.edit',compact('category'));
    }

    // Update Category 

    public function updateCategory(request $Request,$id){
        // dd($id);


        $Request->validate([
            'name' => 'required|max:25|min:4',
            'description' => 'required|min:4',
        ]);






        $data = array();
        $data['name'] = $Request->name;
        $data['slug'] =$Request->description;
        $category = DB::table('categories')->where('id',$id)->update($data);


        // condition 
        if($category){
            $notification = array(
                'message'=>'Successfully Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('AllCategory')->with($notification); 
        }else{

            $notification = array(
                'message'=>'Nothing to update',
                'alert-type'=>'error'
            );
            return Redirect()->route('AllCategory')->with($notification);
        }
    }




}