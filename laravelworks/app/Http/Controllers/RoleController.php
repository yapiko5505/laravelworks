<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function ataach(Request $request, User $user) {
        $roleId=request()->input('role');
        $user->roles()->attach($roleId);
        return back();
    }

    public function detach(Request $request, User $user) {
        $roleId=request()->input('role');
        $user->roles()->detach($roleId);
        return back();
    }
}
