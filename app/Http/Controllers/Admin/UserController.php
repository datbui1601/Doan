<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8|confirmed',
        ]);
        DB::beginTransaction();
        try {
            $data['name'] = $request['name'];
            $data['email'] = $request['email'];
            $data['password'] = bcrypt($request['password']);
            $data['role_id'] = $request['role_id'];
            User::create($data);
            DB::commit();
            return redirect()->route('users.index')->with('success', 'Thêm mới người dùng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Thêm mới người dùng không thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  User::find($id);
        return view('admin.users.edit')->with([
           'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
        ]);
        if ($request['password']){
            $this->validate($request,[
                'password' => 'min:8|confirmed',
            ]);
        }
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user['name'] = $request['name'];
            $user['email'] = $request['email'];
            if ($request['password']) {
                $user['password'] = bcrypt($request['password']);
            }
            $user['role_id'] = $request['role_id'];
            $user->save();
            DB::commit();
            return redirect()->route('users.index')->with('success', 'Chỉnh sửa người dùng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Chỉnh sửa người dùng không thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);
            return response()->json([
                'error' => false,
                'msg' => 'Xóa người dùng thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Xóa người dùng không thành công!'
            ]);
        }
    }
}
