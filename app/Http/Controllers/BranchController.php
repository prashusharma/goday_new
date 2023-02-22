<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role != 'super-admin'){
            $data = Branch::where('company_id',auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
        }else{
            $data = Branch::orderBy('id', 'DESC')->paginate(5);
        }
        return view('branch.index', compact('data'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['state'] = DB::table('user_state')->where('company_id',Auth::User()->id)->get();
        return view("branch.create",compact('data'));
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

        $branch = Branch::create($input);

        return redirect()->route('branch.index')
            ->with('success', 'Branch created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        // dd($branch);
        return view('branch.edit')->with('branch', $branch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        $input = $request->all();
        $branch->update($input);
        return redirect('branch')->with('flash_message', 'branch updated !');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::destroy($id);
        return redirect('branch')->with('flash_message', 'branch deleted');
    }
}
