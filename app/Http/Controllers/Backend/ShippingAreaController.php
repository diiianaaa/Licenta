<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;


class ShippingAreaController extends Controller
{
    public function DivisionView()
    {

        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.view_division', compact('divisions'));
    }



    public function DivisionStore(Request $request)
    {

        $request->validate([
            'division_name' => 'required',

        ]);


        ShipDivision::insert([

            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method 



    public function DivisionEdit($id)
    {

        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division', compact('divisions'));
    }



    public function DivisionDelete($id)
    {

        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method 


    public function DistrictView(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();
            return view('backend.ship.district.view_district',compact('division','district'));
        }


    public function DistrictStore(Request $request){

    	$request->validate([
    		'division_id' => 'required',  
    		'district_name' => 'required',  	 
    	 
    	]);
    	 

	ShipDistrict::insert([
	 
		'division_id' => $request->division_id,
		'district_name' => $request->district_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'District Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



public function DistrictEdit($id){

  $division = ShipDivision::orderBy('division_name','ASC')->get();
  $district = ShipDistrict::findOrFail($id);
	 return view('backend.ship.district.edit_district',compact('district','division'));
    }

    




  public function DistrictDelete($id){

    ShipDistrict::findOrFail($id)->delete();

    $notification = array(
        'message' => 'District Deleted Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('manage-district')->with($notification);

} // end method 


public function CountryView(){

    $division = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('district_name','ASC')->get();
    $state = ShipState::orderBy('id','DESC')->get();
        return view('backend.ship.country.view_country',compact('division','district','state'));

}


public function CountryStore(Request $request){

    $request->validate([
        'division_id' => 'required',  
        'district_id' => 'required', 
        'state_name' => 'required', 	 
     
    ]);
     

ShipState::insert([
 
    'division_id' => $request->division_id,
    'district_id' => $request->district_id,
    'state_name' => $request->state_name,
    'created_at' => Carbon::now(),

    ]);

    $notification = array(
        'message' => 'Country Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

} // end method 

}
