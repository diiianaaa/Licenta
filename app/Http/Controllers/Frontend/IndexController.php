<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $sliders = Slider::orderBy('id', 'ASC')->limit(3)->get();
        $products = Product::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $specialoff = Product::where('special_offer', 1)->limit(6)->get();


        return view('frontend.index', compact('categories', 'sliders', 'products', 'featured', 'specialoff'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {

            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }


        $data->save();
        return redirect()->route('dashboard');
    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }



    public function UserPasswordUpdate(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    }


    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);



        $data['size_en'] = $product->product_size_en;
        $data['product_size_en'] = explode(',', $size_en);


        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);

        $data['size_hin'] = $product->product_size_hin;
        $data['product_size_hin'] = explode(',', $size_hin);

        $multiImg = MultiImg::where('product_id', $id)->get();

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->orderBy('id', 'DESC')->get();
        return view('frontend.product.product_details', compact(
            'product',
            'multiImg',
            'product_size_en',
            'product_size_hin',
            'relatedProduct'
        ));
    }

    public function TagWiseProduct($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }

    public function SubCatWiseProduct($subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.product.subcategory_view', compact('products', 'categories'));
    }

    public function ProductViewAjax($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,

            'size' => $product_size,

        ));
    } // end method 


  
}
