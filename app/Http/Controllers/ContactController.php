<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ContactController extends Controller
{
	// Gets the contacts list
	// Logic: Join the list of followers (people who add you to him contacts list)
	//        and people added by you to your contacts list

	// GET /contacts
	public function index(Request $request) {
		$user = Auth::user();
		// $followers = request()->user()->followers();
		// $following = request()->user()->following;

		// $contacts = $followers->merge($following);

		return response()->json($user);
	}
	// Add a new contact
	// Logic: Follow a person based on they email (phone number to future)

	// POST /contacts
	public function store(Request $request) {
		dd($request->user());
		return response()->json(["data" => "OK"]);
	}
	// Show a contact
	// Logic: Retrieve a contact details based on his email

	// GET /contacts/{email}
	public function show() {

	}
	// Remove a contact
	// Logic: Remove a contact from your contacts list.

	// DELETE /contacts/{email}
	public function destroy() {

	}
}
