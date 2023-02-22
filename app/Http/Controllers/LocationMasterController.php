<?php

namespace App\Http\Controllers;

use App\Models\LocationMaster;
use Illuminate\Http\Request;
use DB;
use Auth;

class LocationMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->id);
        $data['statelist'] = DB::table('state')
        ->orderBy('state_name','ASC')
        ->get();
        $data['selected_state'] = DB::table('user_state')->where('company_id',Auth::User()->id)->get();
        $locations = LocationMaster::where('company_id',auth()->user()->id)->get();
       
        // dd($locations);
        return view('location.index',compact('data'))->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $data['statelist'] = DB::table('state')
        ->orderBy('state_name','ASC')
        ->get();
    

        return view('location.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        LocationMaster::create($input);
        return redirect('location-master')->with('flash_messagae', 'Location added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = LocationMaster::find($id);
        return view('location.edit')->with('locations', $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location = LocationMaster::find($id);
        $input = $request->all();
        $location->update($input);
        return redirect('location')->with('flash_message', 'location updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LocationMaster::destroy($id);
        return redirect('location')->with('flash_message', 'location deleted');
    }


    public function store_state(Request $request)
    {
        DB::table('user_state')->insertGetId(array(
            'company_id'      => $request->company_id,
            'state_id'     => $request->state,
                    ));

    return redirect()->back()->with('flash_message', 'State Added Successfuly');
    }

    public function cityIndex($stateid)
    {
     $data['city'] = DB::table('city')->where('state_id',$stateid)->get();
        return view('city.index',compact('data','stateid'));
    }

    public function cityStore(Request $request)
    {
        DB::table('city')->insertGetId(array(
            'company_id'      => $request->company_id,
            'state_id'     => $request->state_id,
            'city'     => $request->city,
                    ));
                    return redirect()->back()->with('flash_message', 'City Added Successfuly');
    }

    public function areaList($stateid,$cityid)
    {
        $data['area'] = DB::table('area')->where('state_id',$stateid)->where('city_id',$cityid)->get();
        return view('area.index',compact('data','stateid','cityid'));
    }

    public function storeArea(Request $request)
    {
        DB::table('area')->insertGetId(array(
            'company_id'      => $request->company_id,
            'state_id'     => $request->state_id,
            'city_id'     => $request->city_id,
            'area'     => $request->area,
            'pincode'     => $request->pincode,
                    ));
           
                    return redirect()->back()->with('flash_message', 'Area & Pincode Added Successfuly');
    }


    public function getCityList(Request $request)
        {
            $cities = DB::table("city")
            ->where("state_id",$request->state_id)
            ->orderBy('city')
            // ->pluck("name","id");
            ->get();
            return response()->json($cities);
        }

        public function getareaList(Request $request)
        {
            $area = DB::table("area")
            ->where("city_id",$request->city_id)
            ->orderBy('area')
            // ->pluck("name","id");
            ->get();
            return response()->json($area);
        }

        public function getpincode(Request $request)
        {
            $area = DB::table("area")
            ->where("id",$request->area_id)
            // ->pluck("name","id");
            ->get();
            return response()->json($area);
        }
}
