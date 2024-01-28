@extends('layouts.mainLayout')

@section('title','modif memo')

@section('content')
	<h1>Add a memo</h1>
	<form action="{{ route('memo_modif') }} " method="post">
		@csrf
		@forelse ($memos as $memo)
			@if($memo)
				<input type="hidden" id="id" name="id" value="{{$memo->id}}">
				<label for="title">Title:</label> <input type="text" id="title" name="title" value="{{old('title', $memo->title)}}" required><br>
				<label for="content">Content:</label><br>
				<textarea id="content" name="content" rows="8" cols="60">{{old('content', $memo->content)}}</textarea><br>
			@endif
		@empty
			<p>Aucun memo trouvé.</p>
		@endforelse
		<input type="submit" value="Save">
	</form>
	<p>
		Go back to <a href="{{ route('memo_show') }}">liste des memos</a>.
	</p>
@endsection
