<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use DB;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $no = 1;
        return view('users.index', compact('user'), ['no' => $no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth       = Auth::User()->id;
        $users      = \App\User::all()->whereIn('id',$auth);
        $tampilkan  = User::find($id);
    // return view('tampilkan', compact('tampilkan', 'users'));
        return view('users.show', compact('users','tampilkan'));
        // return view('users.show', ['user' => User::findOrFail($id)]);
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
        // return view('users.edit', ['user' => $user]);
        return view('users.edit', compact('user'));
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
            // 'email' => 'required',
        ], [
            'name.required' => 'Tidak boleh kosong!!',
            // 'email.required' => 'Tidak Boleh Kosong'
        ]);
        // DB::table('users')->where('id', $request->id)->update([
        //     // 'id' => $request->id,
        //     'name' => $request->name,
        //     // 'email' => $request->email
        // ]);
        User::where('id',$id)->update([
        // DB::table('users')->where($request->id)->update([
            // 'id' => $request->id,
            'name' => $request->name
        ]);
        return redirect('/users');
        // return redirect('/users');

        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->route('users.index');
    }
}
