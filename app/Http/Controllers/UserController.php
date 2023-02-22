<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd('$auth()->user()');
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
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
        if ($request->has('password')) {
            $input['password'] = Hash::make($input['password']);
        }

        $user = User::create($input);
        

        return redirect()->back()->with('message', 'Member created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function showMember($id)
    {
        $data = User::where('group_id', $id)->orderBy('id', 'DESC')->paginate(5);
        return view('member.show', compact('data', "id"));
    }
    public function activeMember()
    {
        if(auth()->user()->role != 'super-admin'){
            $data = User::where('company_id',auth()->user()->id)->where('status', 1)->paginate(5);
        }else{
            $data = User::where('status', 1)->paginate(5);
        }
        return view('users.active', compact('data'));
    }
    public function pendingMember()
    {
        if(auth()->user()->role != 'super-admin'){
            $data = User::where('company_id',auth()->user()->id)->where('status', 0)->paginate(5);
        }else{
            $data = User::where('status', 0)->paginate(5);
        }
        return view('users.pending', compact('data'));
    }
    public function deletedMember()
    {
        if(auth()->user()->role != 'super-admin'){
            $data = User::where('company_id',auth()->user()->id)->where('deleted', 1)->paginate(5);
        }else{
            $data = User::where('deleted', 1)->paginate(5);
        }
        return view('users.deleted', compact('data'));
    }
    public function staffMember()
    {
        if(auth()->user()->role != 'super-admin'){
            $data = User::where('company_id',auth()->user()->id)->where('role', 'staff')->paginate(5);
        }else{
            $data = User::where('role', 'staff')->paginate(5);
        }
        return view('users.staff', compact('data'));
    }

    public function createMember(Request $request)
    {
        $id = $request->id;

        
        return view('member.create', compact("id"));
    }

    public function updateStatus(Request $request, User $user)
    {
        $user->status = $request->input('status');
        $user->save();
        return response()->json(['success' => true]);
    }

    public function editMember($id){
        $member = User::find($id);
        return view('member.edit')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
    public function updateSystemSetting(Request $request, $id)
    {

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);

        return redirect()->route('dashboard.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
