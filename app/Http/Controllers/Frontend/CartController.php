<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShipDivision;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

        $product = Product::findOrFail($id);
        

        
        Cart::add([
            'id' => $id,
            'name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => [
                'image' => $product->product_small,
                'size' => $request->size,
            ],

            ]);

            return response()->json(['success' => 'Successfully Added on your cart']);

    }

    public function AddMiniCart(){
        
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    }

    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);
    }

    public function AddToWishlist(Request $request,$product_id){

        if(Auth::check()){

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();


            if(!$exists){
                
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),

            ]);
            return response()->json(['success' => ' Successfully added on your Wishlist']);

            }else{
                return response()->json(['error' => 'This product is already on your Wishlist']);
            }
        


        }else{
            return response()->json(['error' => ' First Login with your account ']);
        }

    }


    public function CheckoutCreate(){

        if(Auth::check()){
            if(Cart::total() > 0){

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        

                return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));

            }else{

                $notification = array(
                    'message' => 'Shopping at least one product',
                    'alert-type' => 'error'
                );

                return redirect()->route('/')->with($notification);
        }
            

        }else{
            $notification = array(
                'message' => 'You need to login first',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }

    

    }
}

