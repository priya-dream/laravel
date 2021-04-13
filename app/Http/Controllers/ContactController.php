<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;


class ContactController extends Controller
{

    public function index()
    {
    	$data = Contact::all();
        return view('contacts.index',compact('data'));
    }

    public function update(Request $request)
    {
    	if($request->ajax()){
	       	Contact::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
	        return response()->json(['success' => true]);
    	}
    }

}