<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

use App\Models\MyUser;
use function Laravel\Prompts\table;

class UserController extends Controller
{
	/**************************************************************************
	 * Connect a user with login and password.
	 */
    public function connect(Request $request) {
		if ( !$request->filled(['login','password']) )
			return to_route('view_signin')->with('message',"Some POST data are missing.");

		$user = MyUser::where( 'login', $request->login )->first();

		if ( !$user || !password_verify($request->password,$user->password) )
			return to_route('view_signin')->with('message','Wrong login/password.');

		$request->session()->put('user',$user);

		return to_route('view_account');
	}

	/**************************************************************************
	 * Create a new user.
	 */
	public function create(Request $request) {
		if ( !$request->filled(['login','password','confirm']) )
			return to_route('view_signup')->with('message',"Some POST data are missing.");

		if ( $request->password !== $request->confirm )
			return to_route('view_signup')->with('message',"The two passwords differ.");

		$user = new MyUser;
		$user->login = $request->login;
		$user->password = password_hash($request->password,PASSWORD_DEFAULT);

		try {
			$user->save();
		}
		catch (\Exception $e) {
			return to_route('view_signup')->with('message',$e->getMessage());
		}

		return to_route('view_signin')->with('message',"Account created! Now, signin.");
	}

	/**************************************************************************
	 * Update the password of the connected user.
	 */
	public function updatePassword(Request $request) {
		if ( !$request->user )
			return to_route('view_signin');

		if ( !$request->filled(['newpassword','confirmpassword']) )
			return to_route('view_formpassword')->with('message',"Some POST data are missing.");

		if ( $request->newpassword != $request->confirmpassword )
			return to_route('view_formpassword')->with('message',"Error: passwords are different.");

		$request->user->password = password_hash($request->newpassword,PASSWORD_DEFAULT);;
		try {
			$request->user->save();
		}
		catch (\Exception $e) {
			return to_route('view_formpassword')->with('message',$e->getMessage());
		}

		return to_route('view_account')->with('message',"Password successfully updated.");
	}

	/**************************************************************************
	 * Delete the connected user.
	 */
	public function delete(Request $request) {
		if ( !$request->user )
			return to_route('view_signin');
		$memos = Memo::all();
		foreach ($memos as $memo){
			if ($memo->owner == $request->user){
				$memo->delete();
			}
		}
		try {
			$request->user->delete();
		}
		catch (\Exception $e) {
			return to_route('view_account')->with('message',$e->getMessage());
		}

		$request->session()->flush();

		return to_route('view_signin')->with('message',"Account successfully deleted.");
	}

	/**************************************************************************
	 * Disconnect the connected user.
	 */
	public function disconnect(Request $request) {
		$request->session()->flush();
		return to_route('view_signin');
	}
}
