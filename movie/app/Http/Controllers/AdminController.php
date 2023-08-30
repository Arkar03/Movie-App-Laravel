<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLoginView(Request $request)
    {
        $admin_name = $request->name;
        $admin_password = $request->password;
        return view('admin.login', ['admin_name' => $admin_name, 'admin_password' => $admin_password]);
    }
    public function adminLogin(Request $request)
    {

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            return redirect()->intended('admin/dashboard');
        } else {
            echo 'fail';
        }
    }
    public function isAdmin(string $email)
    {
        $user =  User::where("email", $email)->first();
        return $user->role > 0 ? true : false;
    }
    public function dashboard()
    {
        if (auth()->user()->role > 0 && auth()->user()->ban === 0) {
            $ud = User::where('email', '<>', auth()->user()->email)->get()->toArray();
            $userDatas = array_merge($ud);

            return view('admin.dashboard', compact('userDatas'));
        } else {
            return redirect('movies');
        }
    }
    public function suspend($userId)
    {
        $user = User::where('id', $userId)->first();
        $user->ban = !$user->ban;
        $user->save();
        return redirect('admin/dashboard');
    }
    public function changerole($userId)
    {
        $user = User::where('id', $userId)->first();
        $user->role = !$user->role;
        $user->save();
        return redirect('admin/dashboard');
    }
    public function createadminform()
    {
        return view('admin/create');
    }
    public function createadmin(Request $request)
    {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ];
        User::create($data);

        return redirect('admin/dashboard');
    }

    public function adminuser()
    {


        $ud = User::where('email', '<>', auth()->user()->email)->get()->toArray();
        $userDatas = array_merge($ud);

        $total_admin = User::where('role', '1')->get()->toArray();
        $total_admin_count = count($total_admin);

        $total_user = User::where('role', '0')->get()->toArray();
        $total_user_count = count($total_user);

        return view('admin.user', compact('userDatas', 'total_user_count', 'total_admin_count'));
    }
    public function showuserdetails($id)
    {
        $userdata = User::where('id', $id)->get()->toArray();
        $user = $userdata[0];
        $user_profile = $user['avatar'] ? $user['avatar'] : strtoupper(substr($user['name'], 0 ,2));
        return view('admin.userdetails', compact('user', 'user_profile'));
    }
}
