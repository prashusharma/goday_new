<?php

namespace App\Http\Controllers;

use App\Models\LoanMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoanMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LoanMaster::where('company_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
        // dd($data);
        return view('loan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan.create');
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
        unset($input['_token']);
        $input['company_id'] = auth()->user()->id;
        // dd($input);
        $loan = LoanMaster::create($input);
        return redirect()->route('loan-master.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanMaster  $loanMaster
     * @return \Illuminate\Http\Response
     */
    public function show(LoanMaster $loanMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanMaster  $loanMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanMaster $loanMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoanMaster  $loanMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanMaster $loanMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanMaster  $loanMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanMaster $loanMaster)
    {
        //
    }
}
