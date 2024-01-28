@extends('layouts.mainLayout')

@section('title','Signin')

@section('content')
	<h1>Signin</h1>
	<form action="{{ route('user_authenticate') }}" method="post">
		@csrf
		<label for="login">Login</label>      <input type="text"     id="login"    name="login"    required autofocus>
		<label for="password">Password</label><input type="password" id="password" name="password" required>
		<input type="submit" value="Signin">
	</form>
	<nav>
		<ul>
			<li><a href="{{ route('view_public') }}">public view</a></li>
			<li><a href="{{ route('view_signup') }}">signup.</a></li>
		</ul>
	</nav>
@endsection
