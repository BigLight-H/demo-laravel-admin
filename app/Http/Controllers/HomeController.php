<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.index');
    }

    public function loginOut()
    {
        Auth::logout();
        return redirect('login');
    }
}
