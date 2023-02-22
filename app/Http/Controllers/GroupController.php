<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->id);
        $id = $request->branch_id; 
        return view('group.create',compact("id"));
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
        unset($input["_token"]);
        // dd($input);
        $branch = Group::create($input);

        return redirect()->route('group.show',$input['branch_id'])
            ->with('success', 'Branch created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        if(auth()->user()->role != 'super-admin'){
            $data = Group::where('company_id',auth()->user()->id)->where('branch_id',$id)->orderBy('id', 'DESC')->paginate(5);
        }else{
            $data = Group::where('branch_id',$id)->orderBy('id', 'DESC')->paginate(5);
        }
        return view('group.show', compact('data', "id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        // dd($group);
        return view('group.edit')->with('group', $group);
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
        $group = Group::find($id);
        $input = $request->all();
        // dd($input);
        $group->update($input);
        $data = Group::where('branch_id',$group->branch_id)->orderBy('id', 'DESC')->paginate(5);
        return view('group.show', compact('data', "id"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $branch_id = $group->branch_id;
        Group::destroy($id);
        $data = Group::where('branch_id',$branch_id)->orderBy('id', 'DESC')->paginate(5);
        return view('group.show', compact('data', "id"));
    }
}
