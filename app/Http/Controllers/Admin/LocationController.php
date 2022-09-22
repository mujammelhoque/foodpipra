<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LocationController extends Controller
{

    public function __construct()
   {
 
    // $this->middleware("onlyadmin");
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $all_locations = Location::orderBy('id','DESC')->get();
        $locations = Location::where('parent_id', '=', 0)->get();
        // dd($categories);

        return view('dashboard.admin.location.index',compact('locations','all_locations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'location'      => 'required',
      ]);

        $input = $request->all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Location::create($input);
        return redirect()->route('admin.location.index')->withSuccess('You have successfully created a Category!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    public function editlocation(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $location=Location::find($id);
        $location->update($request->all());
    
        return back()->with('success','Your categroy updated successfully');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return back();
    }

    public function getSublocation(Request $request){
        $sublocations = DB::table("locations")
        ->where("parent_id",$request->location_id)
        ->pluck("location","id");
        return response()->json($sublocations);
    }
    public function getSublocationShippingCost(Request $request){
        $shippingCost = DB::table("locations")
        ->where("id",$request->subLocation_id)
        ->pluck("shipping_cost","id");
        return response()->json($shippingCost);
    }
}
