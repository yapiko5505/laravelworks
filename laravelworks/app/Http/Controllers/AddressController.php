<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AddressController extends Controller
{
    public function index(){
        $users = User::all();
        return view('address.index', compact('users'));
    }
}
