<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function add($id)
    {
        dd(Auth::id());
        $user = User::where('id', $id)->first();
        // 获取直接分配给用户的所有的权限
        $permissions = $user->permissions->toArray();
        dd($permissions);

        $user->givePermissionTo('edit articles');
        $user->assignRole('writer');
        dd('创建完毕');
        $user = $request->user();
        $user->revokePermissionTo('edit articles');
        $role = Role::create(['name' => 'writer']);  // 创建角色
        $permission = Permission::create(['name' => 'edit articles']);// 创建权限
        dd(111);
        //$user->givePermissionTo('edit articles');
    }
}
