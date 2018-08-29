<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function userIndex()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }
}
