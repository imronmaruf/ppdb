<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersDataController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        return view('admin.data-user.index', compact('dataUser'));
    }
}
