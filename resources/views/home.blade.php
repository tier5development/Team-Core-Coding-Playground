@extends('layouts.master_layout')

@section('content')
     <div class="centered">
     	<a href="{{ route('niceaction',['action' => 'greet']) }}">Greet</a>
     	<a href="{{ route('niceaction',['action' => 'hug']) }}">Hug</a>
     	<a href="{{ route('niceaction',['action' => 'kiss']) }}">Kiss</a>
     	<a href="{{ route('niceaction',['action' => 'fuck']) }}">Fuck</a>
     	<br><br>
     	<form action="{{ route('benice') }}" method="post">
     		<label for="select-action">I want to...</label>
     		<select name="action">
     			<option value="greet">Greet</option>
     			<option value="hug">Hug</option>
     			<option value="kiss">Kiss</option>
     			<option value="fuck">Fuck</option>
     		</select>
     		<input type="text" name="name">
     		<button type="submit">Submit</button>
     		<input type="hidden" value="{{ Session::token() }}" name="_token">
     	</form>
     </div>
@endsection