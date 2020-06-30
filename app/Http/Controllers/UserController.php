<?php


namespace App\Http\Controllers;


use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 登录页渲染
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('pages.login');
    }

    /**
     * 用户登录
     * @param Request $request
     * @param User $users
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doLogin(Request $request, User $users)
    {
        $email = $request->input('name');
        $password = $request->input('password');
        $userData = $users->where('email', $email)->first();
        if (!$userData) {
            return redirect('login')->with('error', '用户名或密码错误');
        }
        if (Hash::check($password, $userData->password)) {
            Auth::login($userData);
            return redirect('home');
        } else {
            return redirect('login')->with('error', '用户名或密码错误');
        }
    }

    /**
     * 注册页面渲染
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('pages.register');
    }

    /**
     * 注册用户
     * @param UsersRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doRegister(UsersRequest $request)
    {
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
            return redirect('login');
        }catch(\Exception $e) {
            return redirect('register')->with('errors', ['未知错误']);
        }
    }



}
