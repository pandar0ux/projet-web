@extends('layouts.mainLayout')

@section('title','modif memo')

@section('content')
	<h1>Add a memo</h1>
	<form action="{{ route('memo_modif') }} " method="post">
		@csrf
		@forelse ($memos as $memo)
		<label for="title">Title:</label> <input type="text" id="title" name="title" value="{{old('title', $memo->title)}}" required><br>
		<label for="content">Content:</label><br>
		<textarea id="content" name="content" rows="8" cols="60">{{old('content', $memo->content)}}</textarea><br>
		<input type="radio" id="public" name="memostatus" value="public" {{$memo->status === 'public' ? 'checked' : ''}}><label for="public" >public</label><br>
		<input type="radio" id="private" name="memostatus" value="private" {{$memo->status === 'private' ? 'checked' : ''}}><label for="private" >private</label><br>
		<input type="submit" value="Save">
		@empty
			<p>Aucun memo trouvé.</p>
		@endforelse
	</form>
	<p>
		Go back to <a href="{{ route('memo_show') }}">liste des memos</a>.
	</p>
@endsection
