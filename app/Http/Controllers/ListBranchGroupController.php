<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Group;
use Illuminate\Http\Request;

class ListBranchGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branch_id = $request->branch_id ?? "";
        $group_id = $request->group_id ?? "";

        $filter_group = $branch_id ? Group::where(function($query) use($request){
            if($request->branch_id){
              $query->where("branch_id", $request->branch_id);
            }

            if($request->group_id){
                $query->where("id", $request->group_id);
            }
        })->get() : [];

        if(auth()->user()->role != 'super-admin'){
            $data = Group::with("branch")
            ->where('company_id', auth()->user()->id)
            ->where(function($query) use($request){
                if($request->branch_id){
                    $query->where('branch_id', $request->branch_id);
                }

                if($request->branch_id && $request->group_id){
                    $query->where('id', $request->group_id);
                }
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);

            $branch = Branch::where('company_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        }else{
            $data = Group::with("branch")
                    ->where(function($query) use($request){
                        if($request->branch_id){
                            $query->where('branch_id', $request->branch_id);
                        }

                        if($request->branch_id && $request->group_id){
                            $query->where('id', $request->group_id);
                        }
                    })
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
            $branch = Branch::orderBy('id', 'DESC')->get();
        }

        return view("listbranchgroup.index", compact("data", 'branch', 'group_id', 'branch_id', 'filter_group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("member.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view("listbranchgroup.edit", )
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GroupRelatedBranch(Request $request)
    {
        $group = Group::where("branch_id", $request->branch_id)->get();
        return response()->json($group, 200);
    }
}
