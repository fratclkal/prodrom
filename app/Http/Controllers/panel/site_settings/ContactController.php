<?php

namespace App\Http\Controllers\panel\site_settings;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function list(){
        $contact = Contact::all() -> first();
        return view('panel.site_settings.contact.list')->with(['contact' => $contact]);
    }

    public function create(){
        return view('panel.site_settings.contact.create');
    }

    public function edit(){
        return view('panel.site_settings.contact.edit');
    }

    public function updateContact(Request $request){
        $request -> validate([
           'phone_num' => 'required',
           'email' => 'required',
           'address' => 'required'
        ]);

        $contact = Contact::all()->first();
        $contact -> phone_num = $request -> phone_num;
        $contact -> email = $request -> email;
        $contact -> address = $request -> address;

        if(isset($request -> lat)){
            $contact -> lat = $request -> get('lat');
        }
        else{
            $contact -> lat = 38.68213;
        }

        if (isset($request -> lng)){
            $contact -> lng = $request -> get('lng');
        }
        else{
            $contact -> lng = 39.17709;
        }

        $contact -> save();

        return redirect()->route('contact.list');
    }

}
