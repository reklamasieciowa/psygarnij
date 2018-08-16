<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input as Input;
use Auth;
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
        return view('home', compact('animals'));
    }

     public function zaginione()
    {
        $animals = Animal::where('homeless', '=', 2)->paginate(12);
        return view('home', compact('animals'));
    }

    public function psygarniete()
    {
        $animals = Animal::where('homeless', '=', 0)->paginate(12);
        return view('home', compact('animals'));
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
            'homeless' => 'required',
            'avatar' => 'image|max:2048',
        ]);

        $animal = new Animal;
        $animal->name = $request->name;
        $animal->animaltype_id = 1;
        $animal->sex = $request->sex;
        $animal->age = $request->age;
        $animal->location = $request->location;
        $animal->homeless = $request->homeless;
        if(Input::hasFile('avatar')){
            $path = $request->file('avatar')->store('uploads/img');

            $img = Image::make($request->file('avatar')->getRealPath())->resize(600, 450);

            $watermark = Image::make(public_path('img/psygarnij.png'));

            $img->insert($watermark, 'bottom-right', 10, 10);

            $img->save('storage/'.$path);

            $animal->avatar = 'storage/'.$path;
        }
        $animal->description = $request->description;
        $animal->added = $request->added;
        $animal->verified = 1;
        $animal->user_id = Auth::user()->id;
        
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
            'homeless' => 'required',
            'avatar' => 'image|max:2048',
        ]);

        $animal->name = $request->name;
        $animal->age = $request->age;
        $animal->added = $request->added;
        $animal->description = $request->description;
        $animal->sex = $request->sex;
        $animal->location = $request->location;
        $animal->homeless = $request->homeless;
        
if(Input::hasFile('avatar')){
            $path = $request->file('avatar')->store('uploads/img');

            $img = Image::make($request->file('avatar')->getRealPath())->resize(600, 450);

            //add waternark to image
            if(Storage::exists('uploads/img/psygarnij.png')) {

                $watermark = Image::make('storage/uploads/img/psygarnij.png');

                $img->insert($watermark, 'bottom-right', 10, 10);
            }

            $img->save('storage/'.$path);

            //delete previous avatar file if exists
            if(Storage::exists($animal->avatar)) {
                Storage::delete($animal->avatar);
            }

            //set new avatar path
            $animal->avatar = $path;
        }
        $animal->save();
        $request->session()->flash('status', $animal->name.' zapisany.');
        return redirect()->route('home');
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

        //find and delete animal avatar
        $avatar = 'avatars/'.$animal->id.'.jpg';
        Storage::delete($avatar);

        $request->session()->flash('status', $animal->name.' usunięty.');
        return redirect()->route('home');
    }
}
