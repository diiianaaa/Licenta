<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        return view('backend.product.product_add', compact('categories'));
    }

    public function StoreProduct(Request $request){

        // $request->validate([
        //   'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        // ]);
    
        // if ($files = $request->file('file')) {
        //   $destinationPath = 'upload/pdf'; // upload path
        //   $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //   $files->move($destinationPath,$digitalItem);
        // }
     
    
    
            $image = $request->file('product_small');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
            $save_url = 'upload/products/thambnail/'.$name_gen;
    
          $product_id = Product::insertGetId([
       
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,

              'product_name_en' => $request->product_name_en,
              'product_name_hin' => $request->product_name_hin,
              'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
              'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
              'product_code' => $request->product_code,
    
              'product_quantity' => $request->product_quantity,
              'product_tags_en' => $request->product_tags_en,
              'product_tags_hin' => $request->product_tags_hin,
              'product_size_en' => $request->product_size_en,
              'product_size_hin' => $request->product_size_hin,

    
              'selling_price' => $request->selling_price,
              'discount_price' => $request->discount_price,
              'short_descp_en' => $request->short_descp_en,
              'short_descp_hin' => $request->short_descp_hin,
              'long_descp_en' => $request->long_descp_en,
              'long_descp_hin' => $request->long_descp_hin,
              'product_small' => $save_url,
              'featured' => $request->featured,
              'special_offer' => $request->special_offer,
             
    
         
              'status' => 1,
              'created_at' => Carbon::now(),   
    
          ]);
    
    
          ////////// Multiple Image Upload Start ///////////
    
          $images = $request->file('multi_img');
          foreach ($images as $img) {
              $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multiImg/'.$make_name);
            $uploadPath = 'upload/products/multiImg/'.$make_name;
    
            MultiImg::insert([
    
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 
    
            ]);
    
          }
    
          ////////// Een Multiple Image Upload Start ///////////
    
    
           $notification = array(
                'message' => 'Product Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('manage-product')->with($notification);
    
    
        } // end method

        public function ManageProduct(){

          $products = Product::latest()->get();
          return view('backend.product.product_view',compact('products'));

        }

        public function EditProduct($id){

          $multiImgs = MultiImg::where('product_id',$id)->get();
          $categories = Category::latest()->get();
          $subcategory = SubCategory::latest()->get();
          $products = Product::findOrFail($id);
          return view('backend.product.product_edit', compact('categories','subcategory','products','multiImgs'));
        }

        public function ProductDataUpdate(Request $request){

       
          $product_id = $request->id;
          Product::findOrFail($product_id)->update([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,

            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,
  
            'product_quantity' => $request->product_quantity,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,

  
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
            
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
           
  
       
            'status' => 1,
            'created_at' => Carbon::now(),   

          ]);

          
          $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);


        } //end method
        public function MultiImageUpdate(Request $request){
          $imgs = $request->multi_img;
      
          foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
             
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multiImg/'.$make_name);
            $uploadPath = 'upload/products/multiImg/'.$make_name;
      
            MultiImg::where('id',$id)->update([
              'photo_name' => $uploadPath,
              'updated_at' => Carbon::now(),
      
            ]);
      
         } // end foreach
      
             $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
          );
      
          return redirect()->back()->with($notification);
      
        } // end mehtod 


        public function search(Request $request)
        {
            $products = Product::where('product_name_en', 'like', '%'.$request->input('query').'%')->get();

            return view('frontend.product.search',compact('products'));
        }

    }

    
