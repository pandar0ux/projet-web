@extends('layouts.mainLayout')

@section('title','Add memo')

@section('content')
	<h1>Add a memo</h1>
	<form action="{{ route('memo_add') }} " method="post">
		@csrf
		<label for="title">Title:</label> <input type="text" id="title" name="title" required><br>
		<label for="content">Content:</label><br>
		<textarea id="content" name="content" rows="8" cols="60"></textarea><br>
		<input type="radio" id="public" name="memostatus" value="public"><label for="public">public</label><br>
		<input type="radio" id="private" name="memostatus" value="private" checked><label for="private">private</label><br>
		<input type="submit" value="Save">
	</form>
	<p>
		Go back to <a href="{{ route('view_account') }}">Home</a>.
	</p>
@endsection
