<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\Console\Input\Input;

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
        $userTypes=DB::table('user_type')->pluck('name', 'id');
        return view('admin.author.create', compact('userTypes'));
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
            'password' => ['required', Password::defaults()],//rule from appserviceprovider
            'userTypes'=>'required'
        ]);
        $author = new User;
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->user_type = $request->userTypes;
        $author->status = 1;
        $author->save();

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
        $userTypes=DB::table('user_type')->pluck('name','id');

        return view('admin.author.edit',compact('author','userTypes'));
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
            'password' => ['required', Password::defaults()],//rule from appserviceprover
            'userTypes'=>'required'
        ]);
        $author = User::find($id);
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->user_type = $request->userTypes;
        $author->save();
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

    public function status($id){
        $user = User::find($id);
        if($user->status === 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();

        return redirect('admin/authors')->with('success', 'author status changed');
    }
}
