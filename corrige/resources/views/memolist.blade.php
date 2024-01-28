@extends('layouts.mainLayout')

@section('title','Memo list')

@section('content')
	<h1>Your memo list</h1>

	@forelse ($memos as $memo)
		<section>
			<h5>{{ $memo->title }}</h5>
			<p>{{ $memo->content }}</p>
			<p>{{$memo->status}}</p>
			<a href="{{ route('view_modif',['id'=>$memo->id]) }}">modifier le memo</a>
			<form action="{{ route('change', ['id' => $memo->id]) }}" method="POST">
				@csrf
				<input type="hidden" id="id" name="id" value="{{$memo->id}}">
				<input type="submit" value="Privatiser/Publier">
			</form>
			<form action="{{ route('delete_memo', ['id' => $memo->id]) }}" method="POST">
				@csrf
				<input type="hidden" id="id" name="id" value="{{$memo->id}}">
				<input type="hidden" id="owner" name="owner" value="{{$memo->owner}}">
				<input type="submit" value="supprimer le memo">
			</form>
		</section>
		<hr>
	@empty
		<p>No memo.</p>
	@endforelse

	<p>
		Go back to <a href="{{ route('view_account') }}">Home</a>.
	</p>
@endsection
