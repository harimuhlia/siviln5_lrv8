<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ManageuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usermanage = User::all();
        return view('pengguna.index_pengguna', compact('usermanage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.tambah_pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
            'role'      => 'required',
        ]);
        $usermanage= New User();
        $usermanage->name=$request->get('name');
        $usermanage->email=$request->get('email');
        $usermanage->role=$request->get('role');
        $usermanage->password =Hash::make($request['password']);
        $usermanage->save();

        return redirect('/manageuser')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usermanage = User::find($id);
        return view('pengguna.detail_pengguna', compact('usermanage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usermanage = User::find($id);
        return view('pengguna.edit_pengguna', compact('usermanage'));
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
         User::find($id)->update([
             'name' => $request->name,
             'email' => $request->email,
             'role' => $request->role,
             'password' => Hash::make($request['password']),
         ]);

        return redirect('/manageuser')->with('success', 'Alhamdulillah Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usermanage = User::findOrFail($id);
        $usermanage->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}