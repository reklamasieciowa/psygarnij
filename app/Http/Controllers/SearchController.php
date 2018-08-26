<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function index()
    {
    	$q = Input::get('q');

    	$animals = Animal::search($q)->get();

    	$pages = Page::search($q)->get();

    	return view('search.index', compact('animals', 'pages', 'q'));
    }
}
