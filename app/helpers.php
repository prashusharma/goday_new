<?php

use App\Models\Branch;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;

if (!function_exists("countActivePendingDelete")) {
    function countActivePendingDelete(&$active_count, &$pending_count, &$deleted_count)
    {
        if (auth()->user()->role != 'super-admin') {
            $active_count = User::where('company_id', auth()->user()->id)->where('status', 1)->count();
            $pending_count = User::where('company_id', auth()->user()->id)->where('status', 0)->count();
            $deleted_count = User::where('company_id', auth()->user()->id)->where('deleted', 1)->count();
        } else {
            $active_count = User::where('status', 1)->count();
            $pending_count = User::where('status', 0)->count();
            $deleted_count = User::where('deleted', 1)->count();
        }
    }
}
if (!function_exists("countGroup")) {
    function countGroup(&$group_count, $branch_id)
    {
        if (auth()->user()->role != 'super-admin') {
            $group_count = Group::where('company_id', auth()->user()->id)->where('branch_id', $branch_id)->count();
        }
    }
}
if (!function_exists("countMember")) {
    function countMember(&$member_count, $group_id)
    {
        if (auth()->user()->role != 'super-admin') {
            $member_count = Group::where('company_id', auth()->user()->id)->where('group_id', $group_id)->count();
        }
    }
}
if (!function_exists("getStateCityFund")) {
    function getStateCityFund(&$state_name, &$city_name, &$branch_fund, $branch_id)
    {
        $data = Branch::where('company_id', auth()->user()->id)->where('id', $branch_id)->first();
        // dd($data);
        $branch_fund = $data->opening_fund;
        $state_name = $data->state;
        $city_name = $data->city;
    }
}
if (!function_exists("getFund")) {
    function getFund(&$group_fund, $group_id)
    {
        $data = Group::where('company_id', auth()->user()->id)->where('id', $group_id)->first();
        // dd($data);
        $group_fund = $data->group_opening_fund;
    }
}
if (!function_exists("state")) {
    function state($stateid)
    {
        $selected_state = DB::table('state')->where('id',$stateid)->first();
        // dd($data);
        return @$selected_state->state_name;
    }
}
if (!function_exists("getLoanData")) {
    function getLoanData(&$loan_data)
    {
        $loan_data = DB::table('loan_masters')->where('company_id', auth()->user()->id)->get();
        // dd($loan_data);  
    }
}
if (!function_exists("getLoanData")) {
    function getLoanNameData(&$loan_code)
    {
        $loan_data = DB::table('loan_masters')->where('company_id', auth()->user()->id)->where('loan_code', $loan_code)->get();
        // dd($loan_data);  
    }
}




