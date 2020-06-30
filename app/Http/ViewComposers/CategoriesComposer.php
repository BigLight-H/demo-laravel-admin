<?php


namespace App\Http\ViewComposers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoriesComposer
{
    private $permissions;
    private $request;

    public function __construct(Request $request)
    {
        $user = User::query()->where('id', Auth::user()->id)->first();
        // 获取直接分配给用户的所有的权限
        $this->permissions = $user->permissions->toArray();
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $view->with('permissions', orgMenuList($this->permissions, 0));
    }
}
