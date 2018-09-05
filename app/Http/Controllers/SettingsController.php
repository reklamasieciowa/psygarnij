<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        //global var in AppServiceProvider $siteSettings

        return view('admin.settings.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'app_name' => 'required',
        ]);

        $settings = Settings::findOrFail(1);

        $settings->app_name = $request->app_name;

        if($request->watermark){
            $extension = $request->file('watermark')->getClientOriginalExtension();
            //$path = $request->file('watermark')->storeAs('uploads/img');
            $path = Storage::putFileAs(
                'uploads/img', $request->file('watermark'), 'watermark.'.$extension
            );

            $settings->watermark = $path;
        }

        $settings->save();
        $request->session()->flash('status', 'Ustawienia zapisane.');
        return redirect()->route('settingsedit');
    }
}
