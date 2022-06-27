<?php

namespace App\Http\Controllers\panel\site_settings;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function list(){
        $menu = Menu::all();
        return view('panel.site_settings.menu.list',compact('menu'));
    }

    public function create(){
        return view('panel.site_settings.menu.create');
    }

    public function edit(){
        return view('panel.site_settings.menu.edit');
    }

    public function createMenu(Request $request){
        $request -> validate([
           'name' => 'required',
            'status' => 'required',
            'link' => 'required'
        ]);

        Menu::create([
           'name' => $request -> name,
            'status' => $request -> status,
            'link' => $request -> link
        ]);

        return redirect() -> route('menu.list');
    }

//    public function fetchModalMenu(){
//        $id = request('id');
//        $menu = Menu::find($id);
//
//        return response() -> json($menu);
//    }

//    public function updateMenu(Request $request){
//        $request -> validate([
//           'menu' => 'required'
//        ]);
//
//        $menu = Menu::where('id', $request -> hiddenInput);
//        $menu -> update([
//           'menu' => $request -> menu
//        ]);
//
//        return redirect() -> route('menu.list');
//    }

//    public function remove(Request $request){
//        $menu = Menu::where('id',$request->id);
//        $menu -> delete();
//
//        return redirect() -> route('menu.list');
//    }


}
