@extends('layouts.mainLayout')

@section('title','Account')

@section('content')
	<p>
		Hello user !<br>

	</p>
	@forelse ($memos as $memo)
		<section>
			<h5><a href="{{ route('view_one', ['id'=> $memo->id]) }}">{{ $memo->title }}</a></h5>
		</section>
	@empty
		<p>Aucun mémo public disponible.</p>
	@endforelse
	<nav>
		<ul>
			<li><a href="{{ route('view_signin') }}">signin</a></li>
			<li><a href="{{ route('view_signup') }}">signup</a></li>
		</ul>
	</nav>
@endsection
