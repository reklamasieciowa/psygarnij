<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'metatitle' => 'required',
            'metadescription' => 'required',
            'slug' => 'required|unique:pages',
            'body' => 'required',
        ]);

        $messages = [
            'unique' => 'Pole :attribute musi mieć unikalną wartość.',
        ];


        $news = 0;
            
        if ($request->has('news')) {
            $news = 1;
        } 

        $page = new Page;
        $page->title = $request->title;
        $page->metatitle = $request->metatitle;
        $page->metadescription = $request->metadescription;
        $page->slug = $request->slug;
        $page->body = $request->body;
        $page->news = $news;

        $page->save();
        $request->session()->flash('status', $page->title.' zapisana.');
        return redirect()->route('admin.pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('front.page.show', compact('page'));
    }

    public function shownews()
    {
        $pages = Page::where('news', '=', 1)->orderBy('created_at', 'desc')->paginate(12);
        return view('front.page.news', compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required',
            'metatitle' => 'required',
            'metadescription' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);

        $news = 0;
            
        if ($request->has('news')) {
            $news = 1;
        } 

        $page->title = $request->title;
        $page->metatitle = $request->metatitle;
        $page->metadescription = $request->metadescription;
        $page->slug = $request->slug;
        $page->body = $request->body;
        $page->news = $news;

        $page->save();
        $request->session()->flash('status', $page->title.' zapisana.');
        return redirect()->route('admin.pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
        //find and destroy page
        $page = Page::where('slug', '=', $page->slug);
        $page->delete();

        $request->session()->flash('status', 'Strona usunięta.');
        return redirect()->route('admin.pages');
    }

    //admin
    public function pagesIndex()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }
}
