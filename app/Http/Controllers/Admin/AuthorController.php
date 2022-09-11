<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = User::all();
        return view('admin.author.show', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.author.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|size:8',
            'roles.*'=>'required'
        ]);

        $author = new User;
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->user_type = 2;
        $author->status = 1;
        $author->save();

        foreach($request->roles as $value){
            $author->attachRole($value);
        }

        return redirect('/admin/authors')->with('success', 'Author created success');
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
        $author=User::find($id);
        $roles=Role::pluck('name','id');
        $selectedRoles=DB::table('role_user')->where('user_id',$id) ->pluck('role_id')->toArray();

        return view('admin.author.edit',compact('author','roles','selectedRoles'));
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
            'email' => 'unique:users,email,'.$id,
            'password' => 'required|size:8',
            'roles.*'=>'required'
        ]);
        $author = User::find($id);
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->save();

        DB::table('role_user')->where('user_id', $id)->delete();

        foreach($request->roles as $value){
            $author->attachRole($value);
        }

        return redirect('/admin/authors')->with('success', 'Author Edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('/admin/authors')->with('success', "author deleted"); 
    }
}
