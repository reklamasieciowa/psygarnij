<?php

namespace App\Http\Controllers;

use App\Animal;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::where('homeless', '=', 1)->paginate(12);
        return view('page.home', compact('animals'));
    }

    public function zaginione()
    {
        $animals = Animal::where('homeless', '=', 2)->paginate(12);
        return view('page.home', compact('animals'));
    }

    public function psygarniete()
    {
        $animals = Animal::where('homeless', '=', 0)->paginate(12);
        return view('page.home', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animal.create');
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
            'name' => 'required',
            'age' => 'required',
            'description' => 'required',
            'sex' => 'required',
            'homeless' => 'required'
        ]);

       $animal = new Animal;
       $animal->name = $request->name;
       $animal->animaltype_id = 1;
       $animal->sex = $request->sex;
       $animal->age = $request->age;
       $animal->location = $request->location;
       $animal->homeless = $request->homeless;
       $animal->verified = $request->verified;

       if($request->avatar){
        $path = public_path(str_replace('laravel-filemanager', 'storage/uploads/img', $request->avatar));

            $img = Image::make($path);

            $img->fit(600, 450);

                //add waternark to image
            if(Storage::exists('uploads/img/psygarnij.png')) {

                $watermark = Image::make('storage/uploads/img/psygarnij.png');

                $img->insert($watermark, 'bottom-right', 10, 10);
            }

            $img->save($path);

            $animal->avatar = $request->avatar;
        } else {
            //default avatar
            if(Storage::exists('uploads/img/avatar.jpg')) {
                $animal->avatar = 'storage/uploads/img/avatar.jpg';
            }
        }

    $animal->description = $request->description;
    $animal->added = $request->added;

    //user_id
    $animal->user_id = Auth::User()->id;

    $animal->save();
    $request->session()->flash('status', $animal->name.' zapisany.');
    return redirect()->route('home');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return view('animal.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        return view('animal.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {

        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'added' => 'required',
            'description' => 'required',
            'sex' => 'required',
            'homeless' => 'required'
        ]);

        $animal->name = $request->name;
        $animal->age = $request->age;
        $animal->description = $request->description;
        $animal->added = $request->added;
        $animal->sex = $request->sex;
        $animal->location = $request->location;
        $animal->homeless = $request->homeless;
        $animal->verified = $request->verified;
        
        if($request->avatar){
            $path = public_path(str_replace('laravel-filemanager', 'storage/uploads/img', $request->avatar));


            $img = Image::make($path);

            $img->fit(600, 450);

            //add waternark to image
            if(Storage::exists('uploads/img/psygarnij.png')) {

                $watermark = Image::make('storage/uploads/img/psygarnij.png');

                $img->insert($watermark, 'bottom-right', 10, 10);
            }

            $img->save($path);

            $animal->avatar = $request->avatar;
        }

        $animal->description = $request->description;

        $animal->save();
        $request->session()->flash('status', $animal->name.' zapisany.');
        return redirect()->route('home');
    }

    //Admin

    public function animalsIndex()
    {
        $animals = Animal::all();
        return view('admin.animals', compact('animals'));
    }

    public function verify(Request $request, Animal $animal)
    {
        $animal = Animal::find($animal->id);

        if($animal->verified == 0) {
            $animal->verified = 1;
        } else {
            $animal->verified = 0;
        }

        $animal->save();

        $request->session()->flash('status', $animal->name.' zweryfikowany.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Animal $animal)
    {
        //find and destroy animal
        $animal = Animal::find($animal->id);
        $animal->delete();

        //delete avatar file if exists
        if(Storage::exists($animal->avatar)) {
            Storage::delete($animal->avatar);
        }

        $request->session()->flash('status', $animal->name.' usunięty.');
        return redirect()->back();
    }
}
