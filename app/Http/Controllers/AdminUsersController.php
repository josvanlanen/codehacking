<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        $roles = Role::latest()->get();
        return view('admin.users.create',compact('roles'));
    }

    public function store(UsersRequest $request){

        $input = $request->all();

        if($file = $request->file('photo_id')){
             $name = time().'_'.$file->getClientOriginalName();

             $file->move('images',$name);

             $photo = Photo::create([
                 'file' => $name
             ]);
             $input['photo_id'] = $photo->id;
        }

        $user = User::create($input);

        return redirect('/admin/users');
    }
}
