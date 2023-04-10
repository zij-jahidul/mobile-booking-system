<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function newContactMessage()
    {
        $contacts = Contact::orderBy('id', 'desc')->get()->toArray();
        return view('admin.contact.new_message',[
            'contacts' => $contacts,
        ]);
    }


    public function newMessageDetail($contact_id)
    {
        // Contact::all();
        // echo '<pre>';
        // die;
        $contact = Contact::find($contact_id);
        // echo '<pre>';
        // print_r($contact);
        // die;

        return view('admin.contact.message_detail',[
            'contact'=>$contact,
        ]);
    }

    public function DeleteContact($contact_id)
    {
        Contact::where('id', $contact_id)->delete();
        return back()->with('success_message', 'Product deleted Successfully!');
    }
}
