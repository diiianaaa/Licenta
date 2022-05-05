<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Mapper;
use Redirect;
use Session;



class BlogController extends Controller
{

    public function InfoView()
    {      
        return view('admin.blog.blog_view');
    }

    public function InfoViewUser()
    {     
        Mapper::map(53.38112899, -1.470085000);
        return view('frontend.blog.blog');
      
    }


    public function InfoStore(Request $request){

        
        $request->validate([
            'descp_en' => 'required',
            'descp_ger' => 'required',
        
        ], [
            'descp_en' => 'Input Description in English',
            'descp_ger' => 'Input Description in German',
        ]);



        Blog::insert([
            'descp_en' => $request->descp_en,
            'descp_ger' => $request->descp_en,
           
        ]);


        return redirect()->route('blog');

    }
    
}
