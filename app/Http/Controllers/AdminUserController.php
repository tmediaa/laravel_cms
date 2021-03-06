<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditUserRequest;
use App\Http\Requests\AdminUserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        $input = $request->all();
        $file_photo = $request->file('photo_id');
        if($file_photo){
            $name = time() .'_'. $file_photo->getClientOriginalName();
            $file_photo->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['password'] = bcrypt($request->password);
            $input['photo_id'] = $photo->id;

        }

        User::create($input);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('name', 'id');
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->all();
        $file_photo = $request->file('photo_id');
        if($file_photo){
            $name = time() .'_'. $file_photo->getClientOriginalName();
            $file_photo->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['password'] = bcrypt($request->password);
            $input['photo_id'] = $photo->id;

        }


        $user->update($input);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $username = $user->name;

        $userphoto_id = $user->photo_id;

        unlink(public_path() . $user->photo->file);
        $photo = Photo::findOrFail($userphoto_id)->delete();


        $delete = $user->delete();

        if($delete){
            \Session::flash('user_deleted','User: ' . $username . ' Deleted');
            return redirect('/admin/users');
        }
    }
}
