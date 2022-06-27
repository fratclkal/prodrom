<?php

namespace App\Http\Controllers\panel\site_settings;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function list(){
        $about = About::all();
        return view('panel.site_settings.about.list', compact('about'));
    }

    public function create(){
        return view('panel.site_settings.about.create');
    }

    public function edit(){
        return view('panel.site_settings.about.edit');
    }

    public function createAbout(Request $request){
        $request -> validate([
           'title' => 'required',
           'description' => 'required'
        ]);

        About::create([
           'title' => $request -> title,
           'description' => $request -> description
        ]);

        return redirect() -> route('about.list');
    }

    public function fetchModalAbout(){
        $id = request('id');
        $about = About::find($id);

        return response() -> json($about);
    }

    public function updateAbout(Request $request){
        $request -> validate([
           'title' => 'required',
           'description' => 'required'
        ]);

        $about = About::where('id', $request -> hiddenInput);
        $about -> update([
           'title' => $request -> title,
            'description' => $request -> description
        ]);

        return redirect() -> route('about.list');
    }


}
