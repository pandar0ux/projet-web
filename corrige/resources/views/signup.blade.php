@extends('layouts.mainLayout')

@section('title','Signup')

@section('content')
	<h1>Signup</h1>
	<form action="{{ route('user_adduser') }}" method="post">
		@csrf
		<label for="login">Login</label>             <input type="text"     id="login"    name="login"    required autofocus>
		<label for="password">Password</label>       <input type="password" id="password" name="password" required>
		<label for="confirm">Confirm password</label><input type="password" id="confirm"  name="confirm"  required>
		<input type="submit" value="Signup">
	</form>
	<nav>
		<ul>
			<li><a href="{{ route('view_public') }}">public view</a></li>
			<li><a href="{{ route('view_signin') }}">signin.</a></li>
		</ul>
	</nav>
@endsection
