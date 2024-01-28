@extends('layouts.mainLayout')

@section('title','unique memo')

@section('content')
	<p>
		Hello user !<br>

	</p>
	@forelse ($memos as $memo)
		<section>
			<h5>{{$memo->title }}</h5><br>
			<p>{{$memo->content}}</p><br>
			<p>{{$memo->owner}}</p>
		</section>
	@empty
		<p>Aucun memo trouvé.</p>
	@endforelse
	<nav>
		<ul>
			<li><a href="{{ route('view_public') }}">retour</a> </li>
			<li><a href="{{ route('view_signin') }}">signin</a></li>
			<li><a href="{{ route('view_signup') }}">signup</a></li>
		</ul>
	</nav>
@endsection
