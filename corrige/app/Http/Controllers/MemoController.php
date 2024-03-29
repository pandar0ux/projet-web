<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use IlluminateSupportCarbon;

class MemoController extends Controller
{
    public function add( Request $request ) {
		if ( !$request->filled(['title','content','memostatus']) )
			return to_route('view_formmemo')->with('message',"Some POST data are missing.");

		$memo = new Memo;
		$memo->title = $request->title;
		$memo->content = $request->content;
		$memo->owner = $request->user->login;
		$memo->status = $request->memostatus;
		$memo->publication = date(now());
		$memo->modification = date(now());
		$memo->save();

		return to_route('view_account')->with('message',"New memo added.");
	}

	public function show( Request $request ) {
		$memos = $request->user->memos;
		return view('memolist',['memos'=>$memos]);
	}
	public function public_show()
	{
		$memos = Memo::where('status', 'public')->get();
		return view('publicview',['memos'=>$memos]);
	}
	public function show_one(Request$request){
		$memos = Memo::where('id', $request->id)->get();
		return view('onememo', ['memos'=>$memos]);
	}
	public function modif(Request$request){
		$memos = Memo::where('id', $request->id)->get();
		return view('modification', ['memos'=>$memos]);
	}
	public function memo_modification(Request$request)
	{
		if (!$request->filled(['title', 'content']))
			return to_route('view_modif')->with('message', "Some POST data are missing.");

		$memos = Memo::find($request->id);
		$memos->title = $request->title;
		$memos->content = $request->content;
		$memos->modification = now();
		$memos->save();
		return redirect()->route('view_account')->with('message',"New memo modified.");
	}
	public function change_state(Request $request)
	{
		$memos = Memo::find($request->id);
		if ($memos->status == 'public'){
			$memos->status = 'private';
			$memos->save();
			return redirect()->route('memo_show')->with('message',"memo privatize.");
		}
		else{
			$memos->status = 'public';
			$memos->publication = now();
			$memos->save();
			return redirect()->route('memo_show')->with('message',"memo published.");
		}
	}
	public function delete(Request $request){
			if ( !$request->owner )
				return to_route('view_signin');
			$memos = Memo::find($request->id);
			try {
				$memos->delete();
			}
			catch (\Exception $e) {
				return to_route('view_account')->with('message',$e->getMessage());
			}
		return to_route('view_account')->with('message',"memos successfully deleted.");
	}
}
