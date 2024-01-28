@extends('layouts.mainLayout')

@section('title','Account')

@section('content')
	<p>
		Hello {{ session('user')->login }} !<br>
		Welcome on your account.
	</p>
	<ul>
		<li><a href="{{ route('view_formpassword') }}">Change password.</a></li>
		<li><a href="{{ route('user_deleteuser') }}">Delete my account.</a></li>
	</ul>
	<ul>
		<li><a href="{{ route('view_formmemo') }}">Add a memo.</a></li>
		<li><a href="{{ route('memo_show') }}">Show all memos.</a></li>
	</ul>
	<p><a href="signout">Sign out</a></p>
@endsection
