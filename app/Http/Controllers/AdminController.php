<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Page;
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
        $animals = Animal::all();
        return view('admin.index', compact('animals'));
    }

    public function animalsIndex()
    {
        $animals = Animal::all();
        return view('admin.animals', compact('animals'));
    }

    public function pagesIndex()
    {
        $pages = Page::all();
        return view('admin.pages', compact('pages'));
    }
}
