<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getList()
    {

        $user = User::all();

        return view('admin/user/list', ['user' => $user]);

    }

    public function getAdd()
    {

        $role = Role::all();
        return view('admin/user/add',['role'=>$role]);

    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|min:3',
            'Email' => 'required|email|unique:users,email',
            'Password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:Password',
        
        ], [

            'Name.required' => 'name is required',
            'Name.min' => 'name min 3 characters',

            'Email.required' => 'email is required',
            'Email.email' => 'email not in the correct format',
            'Email.unique' => 'email already exist',

            'Password.required' => 'password is required',
            'Password.min' => 'passwordi min 3 characters',
            'Password.max' => 'password max 32 characters',

            'passwordAgain.required' => 'passwordAgain is required ',
            'passwordAgain.same' => 'password again incorrect',

        ]);
        $user = new User;
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->position = $request->Position;
        $user->id_role = $request->Role;
        $user->save();

        return redirect('admin/user/add')->with('messenger', 'success');
    }

    public function getEdit($id)
    {
        $role = Role::all();
        $user = User::find($id);
        return view('admin/user/edit', ['user' => $user,'role'=>$role]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            ['Name' => 'required|min:3']
            ,
            ['Name.required' => 'name is required',
                'Name.min' => 'name min 3 characters']);

        $user = User::find($id);
        $user->name = $request->Name;
        if (isset($request->changePassword)) {
            $this->validate($request,
                [
                    'Password' => 'required|min:3|max:32',
                    'passwordAgain' => 'required|same:Password',
                ], [
                    'Password.required' => 'password is required',
                    'Password.min' => 'passwordi min 3 characters',
                    'Password.max' => 'password max 32 characters',
                    'passwordAgain.required' => 'passwordAgain is required ',
                    'passwordAgain.same' => 'password again incorrect',
                ]);

            $user->password = bcrypt($request->Password);
        }

        $user->position = $request->Position;
        $user->save();

        return redirect('admin/user/edit/' . $id)->with('messenger', ' edit success');
    }

    public function getEditmyself($id)
    {
      
        $user = User::find($id);
        return view('admin/user/editmyself', ['user' => $user]);

    }

    public function postEditmyself(Request $request,$id)
    {
        $this->validate($request,
        ['Name' => 'required|min:3']
        ,
        ['Name.required' => 'name is required',
         'Name.min' => 'name min 3 characters']);

    $user = user::find($id);
    // giong find($id)  , dang nhap dung Auth
    $user->name = $request->Name;
    if (isset($request->changePassword)) {
        $this->validate($request,
            [
                'Password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:Password',
            ], [
                'Password.required' => 'password is required',
                'Password.min' => 'passwordi min 3 characters',
                'Password.max' => 'password max 32 characters',
                'passwordAgain.required' => 'passwordAgain is required ',
                'passwordAgain.same' => 'password again incorrect',
            ]);

        $user->password = bcrypt($request->Password);
    }

    $user->save();
    return redirect('admin/user/editmyself/'.$id)->with('messenger', ' edit success');
    }



    public function getDelete($id)
    {
        $user = User::find($id);
        $comment = Comment::where('id_user', $id);
        $comment->delete();
        $user->delete();

        return redirect('admin/user/list')->with('messenger', 'delete success');

    }



    public function getLoginAdmin()
    {

        return view('admin/login');

    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,
            ['Email' => 'required', 'Password' => 'required|min:3|max:32'],
            ['Email.required' => 'Email is required',
                'Password.required' => 'Password is required',
                'Password.min' => 'Password is min',
                'Password.max' => 'Password is max']);
        // ten giong db
        if (Auth::attempt(['email' => $request->Email, 'password' => $request->Password])) {
            return redirect('admin/layout/index');
        } else {
            return redirect('admin/login')->with('messenger', 'login fail');
        }

    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/login');

    }

    public function getLogin()
    {
        return view('pages.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [

            'Email' => 'required',
            'Password' => 'required|min:3|max:32',
        ], [
            'Email.required' => 'Email is required',
            'Password.required' => 'Password is required',
            'Password.min' => 'Password min 3 characters',
            'Password.max' => 'Password max 32 characters',
        ]);

        if (Auth::attempt(['email' => $request->Email, 'password' => $request->Password])) {
            return redirect('homepage');
        } else {
            return redirect('login')->with('messenger', 'login fail');

        }

    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('homepage');

    }

    public function getUser()
    {
        return view('pages.user');
    }

    public function postUser(Request $request, $id)
    {
        $this->validate($request,
            ['Name' => 'required|min:3']
            ,
            ['Name.required' => 'name is required',
             'Name.min' => 'name min 3 characters']);

        $user = user::find($id);
        // giong find($id)  , dang nhap dung Auth
        $user->name = $request->Name;
        if (isset($request->changePassword)) {
            $this->validate($request,
                [
                    'Password' => 'required|min:3|max:32',
                    'passwordAgain' => 'required|same:Password',
                ], [
                    'Password.required' => 'password is required',
                    'Password.min' => 'passwordi min 3 characters',
                    'Password.max' => 'password max 32 characters',
                    'passwordAgain.required' => 'passwordAgain is required ',
                    'passwordAgain.same' => 'password again incorrect',
                ]);

            $user->password = bcrypt($request->Password);
        }

        $user->save();
        return redirect('user')->with('messenger', ' edit success');
    }

    public function getRegistration()
    {
        return view('pages.registration');

    }
    public function postRegistration(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|min:3',
            'Email' => 'required|email|unique:users,email',
            'Password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:Password',
        ], [

            'Name.required' => 'Name is required',
            'Name.min' => 'Name is min 3 characters',

            'Email.required' => 'Email is required',
            'Email.email' => 'email not in the correct format',
            'Email.unique' => 'email already exist',

            'Password.required' => 'Password is required',
            'Password.min' => 'Password is min 3 characters',
            'Password.max' => 'Password is max 32 characters',

            'passwordAgain.required' => 'passwordAgain is required',
            'passwordAgain.same' => 'passwordAgain not true',

        ]);
        $user = new User;
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->position = 0;
        $user->save();

        return redirect('login')->with('messenger', 'Registration success');
    }

}
